<?php

namespace App\Livewire\Managenment\Business\Contract;

use App\Models\Business\BusinessContract;
use App\Models\Business\BusinessContractItem;
use App\Models\Business\BusinessContractStatus;
use App\Models\Configuration\ConfigurationFinancialBlock;
use App\Models\Configuration\ConfigurationMeasurementUnit;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ContractItemTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $contractId;
    public $search = '';
    public $perPage = 50;

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['search', 'perPage'])) {
            $this->resetPage();
        }
    }  

    public function render()
    {
        //
        $query = BusinessContractItem::where('contract_id', $this->contractId);

        if (!empty($this->search)) {
            $query->where('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        $dbContract = BusinessContract::find($this->contractId);
        $dbContractItems = $query->orderBy('title')->paginate($this->perPage);
        $dbContractStatus = BusinessContractStatus::where('is_default',TRUE)->first();
        $dbUnits = ConfigurationMeasurementUnit::orderBy('acronym')->get();
        $dbFinancialBlocks = ConfigurationFinancialBlock::orderBy('title')->get();

        return view('livewire.managenment.business.contract.contract-item-table', compact('dbContract','dbContractItems', 'dbContractStatus', 'dbUnits','dbFinancialBlocks'));
    }
}
