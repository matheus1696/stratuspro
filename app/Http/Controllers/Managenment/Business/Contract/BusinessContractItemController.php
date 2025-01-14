<?php

namespace App\Http\Controllers\Managenment\Business\Contract;

use App\Http\Controllers\Controller;
use App\Http\Requests\Managenment\Business\Contract\BusinessContractItemStoreRequest;
use App\Http\Requests\Managenment\Business\Contract\BusinessContractItemUpdateRequest;
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
    public function store(BusinessContractItemStoreRequest $request, BusinessContract $businessContract)
    {    
        // Ajustando o filtro
        $request['filter'] = strtolower($request['title']);
        $request['contract_id'] = $businessContract->id;

        $item_quantity_total = $request['quantity_adm'] + $request['quantity_atb'] + $request['quantity_mac'] + $request['quantity_vsan'] + $request['quantity_vepd'];
        $request['total_price'] = $item_quantity_total * $request['unit_price'];
        
        // Criando o item do contrato
        BusinessContractItem::create($request->all());

        $businessContract->update([
            'total_price' => $businessContract->total_price + $request['total_price'],
        ]);

        return redirect()->route('contracts.show', $businessContract->id)->with('success', 'Item cadastrado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessContractItem $businessContractItem)
    {
        //
        $dbContract = $businessContractItem->contract_id;
        $dbContractItem = $businessContractItem->id;

        return view('pages.managenment.business.contract-item.contract-item-edit', compact('dbContract', 'dbContractItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessContractItemUpdateRequest $request, BusinessContractItem $businessContractItem)
    {
        // Ajustando o filtro
        $request['filter'] = strtolower($request['title']);
        $item_quantity_total = $request['quantity_adm'] + $request['quantity_atb'] + $request['quantity_mac'] + $request['quantity_vsan'] + $request['quantity_vepd'];
        $request['total_price'] = $item_quantity_total * $request['unit_price'];

        // Alterando o item do contrato
        $businessContractItem->update($request->all());

        return redirect()->route('contracts.show', $businessContractItem->contract_id)->with('success','Item alterado com sucesso');
    }
}
