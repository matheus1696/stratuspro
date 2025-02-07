<?php

namespace App\Livewire\Warehouse\WarehouseProcessing;

use App\Models\Configuration\Company\CompanyEstablishment;
use Livewire\Component;

class WarehouseProcessingForm extends Component
{
    public function render()
    {
        $dbEstablishments = CompanyEstablishment::orderBy('title')->get();

        return view('livewire.warehouse.warehouse-processing.warehouse-processing-form', compact('dbEstablishments'));
    }
}
