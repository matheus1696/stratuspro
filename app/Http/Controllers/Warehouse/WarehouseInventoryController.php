<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseMovimentEntryStoreRequest;
use App\Models\Warehouse\WarehouseInventory;
use App\Models\Warehouse\WarehouseMoviment;
use App\Models\Warehouse\WarehouseStorage;
use Illuminate\Support\Facades\Auth;

class WarehouseInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.warehouse.inventory.inventory-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(WarehouseStorage $warehouseStorage)
    {
        //
        return view('pages.warehouse.inventory.inventory-show', compact('warehouseStorage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function entryCreate(WarehouseStorage $warehouseStorage)
    {
        //
        return view('pages.warehouse.inventory.inventory-create', compact('warehouseStorage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function entryStore(WarehouseMovimentEntryStoreRequest $request, WarehouseStorage $warehouseStorage)
    {
        // Transforma a request em array para manipulação
        $data = $request->validated();

        // Calcula valores do movimento
        $data['total_value'] = $data['quantity'] * $data['price'];
        $data['movement_type'] = 'Entrada';
        $data['user_id'] = Auth::id();
        $data['warehouse_id'] = $warehouseStorage->id;

        // Cria o movimento
        WarehouseMoviment::create($data);

        // Verifica se o produto já existe no inventário do almoxarifado
        $dbWarehouseInventory = WarehouseInventory::where('warehouse_id', $warehouseStorage->id)
            ->where('product_id', $data['product_id'])
            ->first(); // Usar first() ao invés de get()

        if ($dbWarehouseInventory) {
            // Calcula novos valores para quantidade e preço médio
            $inventoryItemsTotal = $dbWarehouseInventory->quantity + $data['quantity'];
            $inventoryValueCurrent = $dbWarehouseInventory->quantity * $dbWarehouseInventory->average_price;
            $inventoryValueUpdate = $inventoryValueCurrent + $data['total_value'];
            $inventoryAveragePrice = $inventoryValueUpdate / $inventoryItemsTotal;

            // Atualiza os valores do inventário
            $dbWarehouseInventory->update([
                'quantity' => $inventoryItemsTotal,
                'average_price' => $inventoryAveragePrice, // Corrigido erro de digitação
            ]);
        } else {
            // Se o produto ainda não existe no inventário, cria um novo registro
            WarehouseInventory::create([
                'product_id' => $data['product_id'],
                'quantity' => $data['quantity'],
                'average_price' => $data['price'], // Definir preço médio inicial
                'warehouse_id' => $warehouseStorage->id,
            ]);
        }

        return redirect()->back()->with('success', 'Movimentação registrada com sucesso.');
    }
}
