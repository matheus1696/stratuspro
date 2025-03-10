<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseProcessingItemStoreRequest;
use App\Http\Requests\Warehouse\WarehouseProcessingStoreRequest;
use App\Http\Requests\Warehouse\WarehouseProcessingUpdateRequest;
use App\Models\Warehouse\WarehouseInventory;
use App\Models\Warehouse\WarehouseProcessing;
use App\Models\Warehouse\WarehouseProcessingCategory;
use App\Models\Warehouse\WarehouseProcessingItem;
use App\Models\Warehouse\WarehouseProcessingLog;
use App\Models\Warehouse\WarehouseStorage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class WarehouseProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WarehouseStorage $warehouseStorage)
    {
        return view('pages.warehouse.processing.processing-index', compact('warehouseStorage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(WarehouseStorage $warehouseStorage)
    {
        return view('pages.warehouse.processing.processing-create', compact('warehouseStorage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseProcessingStoreRequest $request, WarehouseStorage $warehouseStorage)
    {
        //Quantidade de Registros
        $date = now()->toDateString(); // Retorna 'YYYY-MM-DD'
        $count = WarehouseProcessing::whereDate('created_at', $date)->count();

        //Categoria Padrão
        $processingCategory = WarehouseProcessingCategory::where('is_default', TRUE)->first();

        //Ajuste para Cadastros
        $request['ticket'] = now()->format('Ymd') . str_pad($count, 4, '0', STR_PAD_LEFT);
        $request['warehouse_id'] = $warehouseStorage->id;
        $request['processing_category_id'] = $processingCategory->id;

        $dbWarehouseProcessing = WarehouseProcessing::create($request->all());

        WarehouseProcessingLog::create([
            'description' => 'Solicitação criada por ' .  Auth::user()->name,
            'processing_id' => $dbWarehouseProcessing->id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('warehouse_processings.show', $dbWarehouseProcessing->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(WarehouseProcessing $warehouseProcessing)
    {
        //
        return view('pages.warehouse.processing.processing-show', compact('warehouseProcessing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function separation(WarehouseProcessing $warehouseProcessing)
    {
        //
        $dbWarehouseProcessingItems = WarehouseProcessingItem::where('processing_id', $warehouseProcessing->id)->get();

        foreach ($dbWarehouseProcessingItems as $value) {
            $dbInventory = WarehouseInventory::where('warehouse_id', $warehouseProcessing->warehouse_id)
                ->where('product_id', $value->product_id)->first();

            if ($dbInventory->quantity < $value->quantity) {
                return redirect()->back()->with('error','Verifique a quantidade do item ' . $dbInventory->WarehouseProduct->title);
            }
        }

        foreach ($dbWarehouseProcessingItems as $value) {
            $dbInventory = WarehouseInventory::where('warehouse_id', $warehouseProcessing->warehouse_id)
                ->where('product_id', $value->product_id)->first();

            $dbInventory->update([
                'quantity' => $dbInventory->quantity - $value->quantity,
            ]);
        }

        $warehouseProcessing->update([
            'processing_category_id' => 2
        ]);

        WarehouseProcessingLog::create([
            'description' => 'Solicitação encaminhada para separação por ' .  Auth::user()->name,
            'processing_id' => $warehouseProcessing->id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success','Solicitação Encaminhada para Separação');
    }
    
    /**
     * Gera o relatório de separação do processamento de almoxarifado.
     */
    public function separationReport(WarehouseProcessing $warehouseProcessing)
    {
        $dbWarehouseProcessingItems = WarehouseProcessingItem::where('processing_id', $warehouseProcessing->id)->get();

        // Carrega a view e gera o PDF
        $pdf = Pdf::loadView('pages.warehouse.processing.processing-report', [
            'warehouseProcessing' => $warehouseProcessing,
            'dbWarehouseProcessingItems' => $dbWarehouseProcessingItems,
        ]);

        // Retorna o PDF para abrir no navegador
        return $pdf->stream('relatorio.pdf');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function itemStore(WarehouseProcessingItemStoreRequest $request, WarehouseProcessing $warehouseProcessing)
    {
        //Verifica se produto está cadastrado na solicitação
        $dbProduct = WarehouseProcessingItem::where('processing_id', $warehouseProcessing->id)
            ->where('product_id', $request['product_id'])
            ->count();

        if ($dbProduct > 0) {            
            return redirect()->route('warehouse_processings.show', $warehouseProcessing->id)->with('error','Produto já cadastrado na solicitação');
        }

        //Verifica se produto informado está com mais de zero item no estoque
        $dbInventory = WarehouseInventory::where('warehouse_id', $warehouseProcessing->warehouse_id)
            ->where('product_id', $request['product_id'])
            ->first();

        if ($dbInventory->quantity < $request['quantity']) {        
            return redirect()->route('warehouse_processings.show', $warehouseProcessing->id)->with('error','Quantitativo informado do Produto menor que o valor do estoque atual');
        }

        $request['processing_id'] = $warehouseProcessing->id;

        $WarehouseProcessingItem = WarehouseProcessingItem::create($request->all());

        WarehouseProcessingLog::create([
            'description' => 'Produto ' . $WarehouseProcessingItem->WarehouseProduct->title . ' adicionado na solicitação por ' .  Auth::user()->name,
            'processing_id' => $warehouseProcessing->id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('warehouse_processings.show', $warehouseProcessing->id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function itemDestroy(WarehouseProcessingItem $warehouseProcessingItem)
    {
        //
        WarehouseProcessingLog::create([
            'description' => 'Produto ' . $warehouseProcessingItem->WarehouseProduct->title . ' retirado da solicitação por ' .  Auth::user()->name,
            'processing_id' => $warehouseProcessingItem->processing_id,
            'user_id' => Auth::user()->id,
        ]);

        $warehouseProcessingItem->delete();

        return redirect()->back()->with('success','Produto excluido com sucesso');
    }
}
