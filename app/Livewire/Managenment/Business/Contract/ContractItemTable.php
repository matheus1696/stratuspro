<?php

namespace App\Livewire\Managenment\Business\Contract;

use App\Models\Business\BusinessContractItem;
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
    
    public $showModal = false; // Controla a visibilidade da modal
    public $title;
    public $description;
    public $unit_id = 1;
    public $unit_price = 0.01;

    protected $rules = [
        'title' => 'required|string|min:5|max:255',
        'description' => 'required|string',
        'unit_id' => 'required|exists:configuration_measurement_units,id',
        'unit_price' => 'required|numeric|min:0',
    ];

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['search', 'perPage'])) {
            $this->resetPage();
        }
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

        $this->reset(['title', 'description', 'unit_id', 'unit_price']); // Limpa os campos
        $this->showModal = false; // Fecha a modal após salvar
    }    

    public function render()
    {
        //
        $query = BusinessContractItem::where('contract_id', $this->contractId);

        if (!empty($this->search)) {
            $query->where('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        $dbContractItems = $query->orderBy('title')->paginate($this->perPage);
        $dbUnits = ConfigurationMeasurementUnit::orderBy('acronym')->get();

        return view('livewire.managenment.business.contract.contract-item-table', compact('dbContractItems', 'dbUnits'));
    }
}
