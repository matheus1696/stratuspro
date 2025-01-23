<?php

namespace App\Livewire\Configuration\Warehouse;

use App\Models\Configuration\Warehouse\WarehouseList;
use Livewire\Component;

class WarehouseListShow extends Component
{
    public $warehouseId;

    public function render()
    {
        $dbWarehouse = WarehouseList::find($this->warehouseId);

        return view('livewire.configuration.warehouse.warehouse-list-show', compact('dbWarehouse'));
    }
}
