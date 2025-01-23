<?php

namespace App\Http\Controllers\Configuration\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configuration\Warehouse\WarehouseItemStoreRequest;
use App\Http\Requests\Configuration\Warehouse\WarehouseItemUpdateRequest;
use App\Models\Configuration\Warehouse\WarehouseItem;
use Illuminate\Http\Request;

class WarehouseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.configuration.warehouse.warehouse-item.warehouse-item-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.configuration.warehouse.warehouse-item.warehouse-item-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseItemStoreRequest $request)
    {
        //
        $request['filter'] = strtolower($request['title']);
        WarehouseItem::create($request->all());

        return redirect()->route('warehouse_items.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WarehouseItem $warehouseItem)
    {
        //
        $dbWarehouseItem = $warehouseItem->id;

        return view('pages.configuration.warehouse.warehouse-item.warehouse-item-edit', compact('dbWarehouseItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WarehouseItemUpdateRequest $request, WarehouseItem $warehouseItem)
    {
        //
        $request['filter'] = strtolower($request['title']);
        $warehouseItem->update($request->all());

        return redirect()->route('warehouse_items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function is_active(Request $request, WarehouseItem $warehouseItem)
    {
        //
        $warehouseItem->update($request->only('is_active'));
        
        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }
}
