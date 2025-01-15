<?php

namespace App\Http\Controllers\Managenment\Business\Contract;

use App\Http\Controllers\Controller;
use App\Http\Requests\Managenment\Business\Contract\BusinessContractSupplierStoreRequest;
use App\Http\Requests\Managenment\Business\Contract\BusinessContractSupplierUpdateRequest;
use App\Models\Business\BusinessContractSupplier;

class BusinessContractSupplierController extends Controller
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
    public function store(BusinessContractSupplierStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessContractSupplier $businessContractSupplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessContractSupplier $businessContractSupplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessContractSupplierUpdateRequest $request, BusinessContractSupplier $businessContractSupplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessContractSupplier $businessContractSupplier)
    {
        //
    }
}
