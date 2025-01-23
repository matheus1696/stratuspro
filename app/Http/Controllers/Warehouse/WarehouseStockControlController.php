<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Warehouse\WarehouseStockControl;
use App\Http\Requests\Warehouse\WarehouseStockControlStoreRequest;
use App\Http\Requests\Warehouse\WarehouseStockControlUpdateRequest;
use Illuminate\Http\Request;

class WarehouseStockControlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.warehouse.stock-control.stock-control-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.warehouse.stock-control.stock-control-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseStockControlStoreRequest $request)
    {
        //
        $request['filter'] = strtolower($request['title']);
        WarehouseStockControl::create($request->all());

        return redirect()->route('stock_controls.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(WarehouseStockControl $warehouseStockControl)
    {
        //
        $dbStockControl = $warehouseStockControl->id;

        return view('pages.warehouse.stock-control.stock-control-show', compact('dbStockControl'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WarehouseStockControl $warehouseStockControl)
    {
        //
        $dbStockControl = $warehouseStockControl->id;

        return view('pages.warehouse.stock-control.stock-control-edit', compact('dbStockControl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WarehouseStockControlUpdateRequest $request, WarehouseStockControl $warehouseStockControl)
    {
        //
        $request['filter'] = strtolower($request['title']);
        $warehouseStockControl->update($request->all());

        return redirect()->route('stock_controls.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function is_active(Request $request, WarehouseStockControl $warehouseStockControl)
    {
        //
        $warehouseStockControl->update($request->only('is_active'));
        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }
}
