<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseProcessingStoreRequest;
use App\Http\Requests\Warehouse\WarehouseProcessingUpdateRequest;
use App\Models\Warehouse\WarehouseProcessing;

class WarehouseProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.warehouse.processing.processing-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseProcessingStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WarehouseProcessing $warehouseProcessing)
    {
        //
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
}
