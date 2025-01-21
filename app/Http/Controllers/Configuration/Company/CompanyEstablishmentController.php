<?php

namespace App\Http\Controllers\Configuration\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configuration\Company\CompanyEstablishmentStoreRequest;
use App\Http\Requests\Configuration\Company\CompanyEstablishmentUpdateRequest;
use App\Models\Configuration\Company\CompanyEstablishment;
use Illuminate\Http\Request;

class CompanyEstablishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.configuration.company.establishment.establishment-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.configuration.company.establishment.establishment-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyEstablishmentStoreRequest $request)
    {
        //
        $request['filter'] = strtolower($request['title']);
        $dbEstablishment = CompanyEstablishment::create($request->all());

        return redirect(route('establishments.show', $dbEstablishment->id ))->with('success','Estabelecimento criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyEstablishment $companyEstablishment)
    {
        //
        $dbEstablishment = $companyEstablishment->id;
        return view('pages.configuration.company.establishment.establishment-show', compact('dbEstablishment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyEstablishment $companyEstablishment)
    {
        //
        $dbEstablishment = $companyEstablishment->id;
        return view('pages.configuration.company.establishment.establishment-edit', compact('dbEstablishment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyEstablishmentUpdateRequest $request, CompanyEstablishment $companyEstablishment)
    {
        //Dados dos Formulários
        $request['filter'] = StrtoLower($request['title']);

        //Salvando Dados
        $companyEstablishment->update($request->all());

        return redirect(route('establishments.show', $companyEstablishment->id ))->with('success','Estabelecimento alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function is_active(Request $request, CompanyEstablishment $companyEstablishment)
    {
        //
        $companyEstablishment->update($request->only('is_active'));
        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }
}
