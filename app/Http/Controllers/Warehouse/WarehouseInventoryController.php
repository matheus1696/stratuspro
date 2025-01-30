<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseMovimentEntryStoreRequest;
use App\Models\Warehouse\WarehouseStorage;

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
    public function create(WarehouseStorage $warehouseStorage)
    {
        //
        return view('pages.warehouse.inventory.inventory-create', compact('warehouseStorage'));
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function entryStore(WarehouseMovimentEntryStoreRequest $request, WarehouseStorage $warehouseStorage)
    {
        //
    }
}
