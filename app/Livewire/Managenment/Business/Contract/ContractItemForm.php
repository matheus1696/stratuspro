<?php

namespace App\Livewire\Managenment\Business\Contract;

use App\Models\Business\BusinessContract;
use App\Models\Configuration\ConfigurationFinancialBlock;
use App\Models\Configuration\ConfigurationMeasurementUnit;
use Livewire\Component;

class ContractItemForm extends Component
{
    public $contractId;

    public function render()
    {
        $dbContract = BusinessContract::with('FinancialBlocks')->findOrFail($this->contractId);
        $dbUnits = ConfigurationMeasurementUnit::orderBy('acronym')->get();
        $dbFinancialBlocks = ConfigurationFinancialBlock::orderBy('title')->get();
        return view('livewire.managenment.business.contract.contract-item-form', compact('dbContract','dbUnits','dbFinancialBlocks'));
    }
}
