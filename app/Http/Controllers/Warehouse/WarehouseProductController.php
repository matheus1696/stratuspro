<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseProductStoreRequest;
use App\Http\Requests\Warehouse\WarehouseProductUpdateRequest;
use App\Models\Warehouse\WarehouseProduct;
use Illuminate\Http\Request;

class WarehouseProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.warehouse.product.product-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.warehouse.product.product-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseProductStoreRequest $request)
    {
        //
        $request['filter'] = strtolower($request['title']);
        WarehouseProduct::create($request->all());

        return redirect()->route('warehouse_products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WarehouseProduct $warehouseProduct)
    {
        //
        $dbWarehouseProduct = $warehouseProduct->id;

        return view('pages.warehouse.product.product-edit', compact('dbWarehouseProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WarehouseProductUpdateRequest $request, WarehouseProduct $warehouseProduct)
    {
        //
        $request['filter'] = strtolower($request['title']);
        $warehouseProduct->update($request->all());

        return redirect()->route('warehouse_products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function is_active(Request $request, WarehouseProduct $warehouseProduct)
    {
        //
        $warehouseProduct->update($request->only('is_active'));
        
        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }
}
