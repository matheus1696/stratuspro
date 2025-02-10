<?php

namespace App\Livewire\Warehouse\WarehouseProcessing;

use App\Models\Warehouse\WarehouseInventory;
use App\Models\Warehouse\WarehouseProcessing;
use Livewire\Component;

class WarehouseProcessingItemForm extends Component
{
    public $dbWarehouseProcessingId;

    public function render()
    {
        $dbWarehouseProcessing = WarehouseProcessing::find($this->dbWarehouseProcessingId);
        $dbWarehouseInventories = WarehouseInventory::where('warehouse_id', $dbWarehouseProcessing->warehouse_id)->get();

        return view('livewire.warehouse.warehouse-processing.warehouse-processing-item-form', compact('dbWarehouseInventories'));
    }
}
