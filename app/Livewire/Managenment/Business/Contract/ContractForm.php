<?php

namespace App\Livewire\Managenment\Business\Contract;

use App\Models\Business\BusinessContractStatus;
use Livewire\Component;

class ContractForm extends Component
{
    // O método mount é executado quando o componente é montado
    public function mount($businessContractId)
    {
        // Armazena o ID
        $this->businessContractId = $businessContractId;

        // Realiza a busca no banco de dados usando o ID
        $this->contract = BusinessContract::find($this->businessContractId);

        // Caso queira retornar um erro caso não encontre o contrato
        if (!$this->contract) {
            session()->flash('error', 'Contrato não encontrado.');
            return redirect()->route('contracts.index'); // ou qualquer outra rota que deseje
        }
    }
    
    public function render()
    {
        $dbStatuses = BusinessContractStatus::orderBy('title')->get();

        return view('livewire.managenment.business.contract.contract-form', compact('dbStatuses'));
    }
}
