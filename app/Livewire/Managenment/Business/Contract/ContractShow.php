<?php

namespace App\Livewire\Managenment\Business\Contract;

use App\Models\Business\BusinessContract;
use App\Models\Business\BusinessContractStatus;
use Livewire\Component;

class ContractShow extends Component
{
    public $contractId;
    public $dbContract;

    public function mount($contractId = null)
    {
        $this->contractId = $contractId;
        $this->dbContract = BusinessContract::with('FinancialBlocks')->find($this->contractId);
    }

    public function render()
    {
        $dbContractStatus = BusinessContractStatus::where('is_default',TRUE)->first();

        return view('livewire.managenment.business.contract.contract-show', compact('dbContractStatus'));
    }
}
