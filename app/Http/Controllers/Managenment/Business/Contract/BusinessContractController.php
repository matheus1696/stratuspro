<?php

namespace App\Http\Controllers\Managenment\Business\Contract;

use App\Http\Controllers\Controller;
use App\Models\Business\BusinessContract;
use App\Http\Requests\Managenment\Business\Contract\BusinessContractStoreRequest;
use App\Http\Requests\Managenment\Business\Contract\BusinessContractUpdateRequest;

class BusinessContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.managenment.business.contract.contract-index');
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
    public function store(BusinessContractStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessContract $businessContract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessContract $businessContract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessContractUpdateRequest $request, BusinessContract $businessContract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessContract $businessContract)
    {
        //
    }
}
