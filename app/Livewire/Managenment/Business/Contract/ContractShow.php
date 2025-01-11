<?php

namespace App\Livewire\Managenment\Business\Contract;

use App\Models\Business\BusinessContract;
use Livewire\Component;

class ContractShow extends Component
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
        return view('livewire.managenment.business.contract.contract-show');
    }
}
