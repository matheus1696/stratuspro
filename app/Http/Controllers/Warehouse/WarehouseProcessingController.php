<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseProcessingStoreRequest;
use App\Http\Requests\Warehouse\WarehouseProcessingUpdateRequest;
use App\Models\Warehouse\WarehouseProcessing;
use App\Models\Warehouse\WarehouseProcessingItem;
use App\Models\Warehouse\WarehouseProcessingUser;
use App\Models\Warehouse\WarehouseStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WarehouseStorage $warehouseStorage)
    {
        //
        return view('pages.warehouse.processing.processing-index', compact('warehouseStorage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(WarehouseStorage $warehouseStorage)
    {
        //
        return view('pages.warehouse.processing.processing-create', compact('warehouseStorage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseProcessingStoreRequest $request, WarehouseStorage $warehouseStorage)
    {
        //
        $count = WarehouseProcessing::count();

        $request['ticket'] = now()->format('Ymd') . str_pad($count, 6, '0', STR_PAD_LEFT);
        $request['warehouse_id'] = $warehouseStorage->id;

        $dbWarehouseProcessing = WarehouseProcessing::create($request->all());

        WarehouseProcessingUser::create([
            'action' => 'created',
            'processing_id' => $dbWarehouseProcessing->id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('warehouse_processings.index', $warehouseStorage->id);
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
    public function edit(WarehouseProcessing $warehouseProcessing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WarehouseProcessingUpdateRequest $request, WarehouseProcessing $warehouseProcessing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WarehouseProcessing $warehouseProcessing)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function itemStore(Request $request, WarehouseProcessing $warehouseProcessing)
    {
        //
        $dbProduct = WarehouseProcessingItem::where('processing_id', $warehouseProcessing->id)
            ->where('product_id', $request['product_id'])
            ->count();

        if ($dbProduct > 0) {            
            return redirect()->route('warehouse_processings.show', $warehouseProcessing->id)->with('error','Produto já cadastrado na solicitação');
        }


        $request['processing_id'] = $warehouseProcessing->id;

        WarehouseProcessingItem::create($request->all());

        return redirect()->route('warehouse_processings.show', $warehouseProcessing->id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function itemDestroy(WarehouseProcessingItem $warehouseProcessing)
    {
        //
        $warehouseProcessing->delete();

        return redirect()->back()->with('success','Produto excluido com sucesso');
    }
}
