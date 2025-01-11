<?php

namespace App\Livewire\Managenment\Business\Contract;

use App\Models\Business\BusinessContract;
use App\Models\Business\BusinessContractStatus;
use Livewire\Component;

class ContractForm extends Component
{
    public $contractId;
    public $dbContract;

    public function mount($contractId = null)
    {
        $this->contractId = $contractId;
        $this->dbContract = BusinessContract::find($this->contractId);
    }
    
    public function render()
    {
        $dbStatuses = BusinessContractStatus::orderBy('title')->get();

        return view('livewire.managenment.business.contract.contract-form', compact('dbStatuses'));
    }
}
