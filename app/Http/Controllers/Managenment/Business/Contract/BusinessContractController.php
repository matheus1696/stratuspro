<?php

namespace App\Http\Controllers\Managenment\Business\Contract;

use App\Http\Controllers\Controller;
use App\Models\Business\BusinessContract;
use App\Http\Requests\Managenment\Business\Contract\BusinessContractStoreRequest;
use App\Http\Requests\Managenment\Business\Contract\BusinessContractUpdateRequest;
use App\Models\Business\BusinessContractItem;
use App\Models\Business\BusinessContractStatus;
use Carbon\Carbon;

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
        return view('pages.managenment.business.contract.contract-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessContractStoreRequest $request)
    {
        //
        $period = (int) $request['period'];
        $startDate = Carbon::parse($request['start_date']);
        $endDate = $startDate->addMonths($period);        

        $request['filter'] = strtolower($request['title']);
        $request['end_date'] = $endDate;
        $request['total_price'] = 0.00;
        $request['request_price'] = 0.00;
        $request['balance_price'] = 0.00;
        $request['status_id'] = BusinessContractStatus::where('is_default', TRUE)->first()->id;

        $contract = BusinessContract::create($request->all());

        // Sincroniza os blocos financeiros
        $contract->FinancialBlocks()->sync($request->input('financialBlock', []));

        return redirect()->route('contracts.show', $contract->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessContract $businessContract)
    {
        //
        $dbContract = $businessContract->id;
        
        return view('pages.managenment.business.contract.contract-show', compact('dbContract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessContract $businessContract)
    {
        //
        $dbContract = $businessContract->id;
        
        return view('pages.managenment.business.contract.contract-edit', compact('dbContract'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessContractUpdateRequest $request, BusinessContract $businessContract)
    {
        //
        $businessContract->update($request->all());
        $businessContract->FinancialBlocks()->sync($request->input('financialBlock', []));

        return redirect()->route('contracts.show', $businessContract->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function price(BusinessContract $businessContract)
    {
        
        $total_price = 0;
        $dbContractItems = BusinessContractItem::where('contract_id', $businessContract->id)->get();

        foreach ($dbContractItems as $dbContractItem) {
            $total_price += $dbContractItem->total_price;
        }

        $businessContract->update([
            'total_price' => $total_price,
        ]);

        return redirect()->route('contracts.show', $businessContract->id)->with('success','Item alterado com sucesso');
    }
}
