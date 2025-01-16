<?php

namespace App\Livewire\Managenment\Business\Contract;

use App\Models\Business\BusinessContract;
use App\Models\Business\BusinessContractItem;
use App\Models\Business\BusinessContractSupplier;
use App\Models\Configuration\ConfigurationFinancialBlock;
use App\Models\Configuration\ConfigurationMeasurementUnit;
use Livewire\Component;

class ContractItemForm extends Component
{
    public $contractId;
    public $contractItemId;

    public $query = '';
    public $suppliers = [];
    public $selectedSupplier = null;

    public function updatedQuery()
    {
        $this->suppliers = BusinessContractSupplier::where('supplier', 'like', '%' . $this->query . '%')
            ->limit(10)
            ->get();
    }

    public function selectSupplier($supplierId)
    {
        $this->selectedSupplier = BusinessContractSupplier::find($supplierId);
        $this->query = $this->selectedSupplier->supplier;
        $this->suppliers = []; // Limpa as sugestões após a seleção
    }

    public function render(){
        $dbContract = BusinessContract::with('FinancialBlocks')->find($this->contractId);
        $dbContractItem = BusinessContractItem::find($this->contractItemId);
        $dbUnits = ConfigurationMeasurementUnit::orderBy('acronym')->get();
        $dbFinancialBlocks = ConfigurationFinancialBlock::orderBy('title')->get();

        return view('livewire.managenment.business.contract.contract-item-form', compact('dbContract', 'dbContractItem','dbUnits','dbFinancialBlocks'));
    }
}