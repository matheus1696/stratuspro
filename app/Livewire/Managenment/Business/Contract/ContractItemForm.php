<?php

namespace App\Livewire\Managenment\Business\Contract;

use App\Models\Business\BusinessContract;
use App\Models\Business\BusinessContractItem;
use App\Models\Business\BusinessContractStatus;
use App\Models\Business\BusinessContractSupplier;
use App\Models\Configuration\ConfigurationFinancialBlock;
use App\Models\Configuration\ConfigurationMeasurementUnit;
use Livewire\Component;

class ContractItemForm extends Component
{
    public $contractId;
    public $contractItemId;

    public function render()
    {
        $dbContract = BusinessContract::with('FinancialBlocks')->find($this->contractId);
        $dbContractItem = BusinessContractItem::find($this->contractItemId);
        $dbSuppliers = BusinessContractSupplier::where('is_active',TRUE)->orderBy('supplier')->get();
        $dbUnits = ConfigurationMeasurementUnit::orderBy('acronym')->get();
        $dbFinancialBlocks = ConfigurationFinancialBlock::orderBy('title')->get();


        return view('livewire.managenment.business.contract.contract-item-form', compact('dbContract', 'dbContractItem','dbUnits','dbFinancialBlocks', 'dbSuppliers'));
    }
}
