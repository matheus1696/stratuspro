<?php

namespace App\Livewire\Managenment\Business\Contract;

use App\Models\Business\BusinessContractItem;
use App\Models\Configuration\ConfigurationMeasurementUnit;
use Livewire\Component;

class ContractItemForm extends Component
{
    public $contractId;
    public $showModal = false; // Controla a visibilidade da modal
    public $title;
    public $description;
    public $unit_id = 1;
    public $unit_price = 0.01;

    protected $rules = [
        'title' => 'required|string|min:5|max:255',
        'description' => 'required|string',
        'unit_id' => 'required',
        'unit_price' => 'required|numeric|min:0',
    ];

    public function save()
    {
        $this->validate();

        BusinessContractItem::create([
            'title' => $this->title,
            'filter' => strtolower($this->title),
            'description' => $this->description,
            'unit_id' => $this->unit_id,
            'unit_price' => $this->unit_price,
            'contract_id' => $this->contractId,
        ]);

        session()->flash('message', 'Item criado com sucesso!');
        $this->reset(['title', 'description', 'unit_id', 'unit_price']); // Limpa os campos
        $this->showModal = false; // Fecha a modal após salvar
    }

    public function openModal()
    {
        $this->reset(['title', 'description', 'unit_id', 'unit_price']); // Limpa os campos ao abrir
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        $dbUnits = ConfigurationMeasurementUnit::orderBy('acronym')->get();
        return view('livewire.managenment.business.contract.contract-item-form', compact('dbUnits'));
    }
}
