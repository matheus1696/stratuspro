<?php

namespace App\Http\Controllers;

use App\Models\Warehouse\WarehouseProductCategory;
use App\Http\Requests\StoreWarehouseProductCategoryRequest;
use App\Http\Requests\UpdateWarehouseProductCategoryRequest;
use App\Http\Requests\Warehouse\WarehouseProductCategoryStoreRequest;
use App\Http\Requests\Warehouse\WarehouseProductCategoryUpdateRequest;

class WarehouseProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(WarehouseProductCategoryStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WarehouseProductCategory $warehouseProductCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WarehouseProductCategory $warehouseProductCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WarehouseProductCategoryUpdateRequest $request, WarehouseProductCategory $warehouseProductCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WarehouseProductCategory $warehouseProductCategory)
    {
        //
    }
}
