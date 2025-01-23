<?php

namespace App\Http\Controllers\Configuration\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configuration\Warehouse\WarehouseListStoreRequest;
use App\Http\Requests\Configuration\Warehouse\WarehouseListUpdateRequest;
use App\Models\Configuration\Warehouse\WarehouseList;
use Illuminate\Http\Request;

class WarehouseListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.configuration.warehouse.warehouse-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.configuration.warehouse.warehouse-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseListStoreRequest $request)
    {
        //
        $request['filter'] = strtolower($request['title']);
        WarehouseList::create($request->all());

        return redirect()->route('warehouses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(WarehouseList $warehouseList)
    {
        //
        $dbWarehouse = $warehouseList->id;

        return view('pages.configuration.warehouse.warehouse-show', compact('dbWarehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WarehouseList $warehouseList)
    {
        //
        $dbWarehouse = $warehouseList->id;

        return view('pages.configuration.warehouse.warehouse-edit', compact('dbWarehouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WarehouseListUpdateRequest $request, WarehouseList $warehouseList)
    {
        //
        $request['filter'] = strtolower($request['title']);
        $warehouseList->update($request->all());

        return redirect()->route('warehouses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function is_active(Request $request, WarehouseList $warehouseList)
    {
        //
        $warehouseList->update($request->only('is_active'));
        
        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }
}
