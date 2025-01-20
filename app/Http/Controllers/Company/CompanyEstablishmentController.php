<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyEstablishmentStoreRequest;
use App\Http\Requests\Company\CompanyEstablishmentUpdateRequest;
use App\Models\Company\CompanyEstablishment;

class CompanyEstablishmentController extends Controller
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
    public function store(CompanyEstablishmentStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyEstablishment $companyEstablishment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyEstablishment $companyEstablishment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyEstablishmentUpdateRequest $request, CompanyEstablishment $companyEstablishment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyEstablishment $companyEstablishment)
    {
        //
    }
}
