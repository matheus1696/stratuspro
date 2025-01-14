<?php

namespace App\Http\Controllers\Managenment\Business\Contract;

use App\Http\Controllers\Controller;
use App\Http\Requests\Managenment\Business\Contract\BusinessContractItemStoreRequest;
use App\Models\Business\BusinessContractItem;
use App\Models\Business\BusinessContract;

class BusinessContractItemController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(BusinessContract $businessContract)
    {
        //
        $dbContract = $businessContract->id;

        return view('pages.managenment.business.contract-item.contract-item-create', compact('dbContract'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessContractItemStoreRequest $request, string $id)
    {
        // Validação será realizada automaticamente
        $validated = $request->validated();
    
        // Ajustando o filtro
        $request['filter'] = strtolower($request['title']);
        $request['contract_id'] = $id;
        
        // Criando o item do contrato
        $contractItem = BusinessContractItem::create($request->all());

        // Sincronizando os blocos financeiros com os valores de quantidade
        $financialBlockData = [];
        foreach ($request->input('financialBlock', []) as $key => $quantity) {
            $financialBlockData[$key] = ['quantity' => $quantity];  // Passando a quantidade para a tabela pivot
        }

        // Sincronizando a tabela pivot
        $contractItem->FinancialBlocks()->sync($financialBlockData);

        return redirect()->route('contracts.show', $id)->with('success', 'Item cadastrado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessContract $businessContract)
    {
        //
        $dbContract = $businessContract->id;

        return view('pages.managenment.business.contract-item.contract-item-edit', compact('dbContract'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBusinessContractItemRequest $request, BusinessContractItem $businessContractItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessContractItem $businessContractItem)
    {
        //
    }
}
