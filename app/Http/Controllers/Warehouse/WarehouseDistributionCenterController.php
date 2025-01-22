<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseDistributionCenterStoreRequest;
use App\Http\Requests\Warehouse\WarehouseDistributionCenterUpdateRequest;
use App\Models\Warehouse\WarehouseDistributionCenter;
use Illuminate\Http\Request;

class WarehouseDistributionCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.warehouse.distribution-center.distribution-center-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.warehouse.distribution-center.distribution-center-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseDistributionCenterStoreRequest $request)
    {
        //
        $request['filter'] = strtolower($request['title']);
        WarehouseDistributionCenter::create($request->all());

        return redirect()->route('distribution_centers.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WarehouseDistributionCenter $warehouseDistributionCenter)
    {
        //
        $dbDistributionCenter = $warehouseDistributionCenter->id;

        return view('pages.warehouse.distribution-center.distribution-center-edit', compact('dbDistributionCenter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WarehouseDistributionCenterUpdateRequest $request, WarehouseDistributionCenter $warehouseDistributionCenter)
    {
        //
        $request['filter'] = strtolower($request['title']);
        $warehouseDistributionCenter->update($request->all());

        return redirect()->route('distribution_centers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function is_active(Request $request, WarehouseDistributionCenter $warehouseDistributionCenter)
    {
        //
        $warehouseDistributionCenter->update($request->only('is_active'));
        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }
}
