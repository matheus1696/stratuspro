<?php

namespace App\Livewire\Warehouse\WarehouseProcessing;

use App\Models\Warehouse\WarehouseProcessing;
use Livewire\Component;

class WarehouseProcessingTable extends Component
{
    public function render()
    {
        // Inicia a consulta de usuários
        $dbWarehouseProcessings = WarehouseProcessing::orderBy('ticket')->get();

        return view('livewire.warehouse.warehouse-processing.warehouse-processing-table', compact('dbWarehouseProcessings'));
    }
}
