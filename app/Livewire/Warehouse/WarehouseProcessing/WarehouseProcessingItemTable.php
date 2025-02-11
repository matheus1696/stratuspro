<?php

namespace App\Livewire\Warehouse\WarehouseProcessing;

use App\Models\Warehouse\WarehouseInventory;
use App\Models\Warehouse\WarehouseProcessing;
use App\Models\Warehouse\WarehouseProcessingItem;
use Livewire\Component;

class WarehouseProcessingItemTable extends Component
{
    public $dbWarehouseProcessingId;

    public function render()
    {
        $dbWarehouseProcessing = WarehouseProcessing::where('id', $this->dbWarehouseProcessingId)->first();
        $dbWarehouseProcessingItems = WarehouseProcessingItem::where('processing_id', $this->dbWarehouseProcessingId)->get();

        $dbWarehouseInventories = WarehouseInventory::where('warehouse_id', $dbWarehouseProcessing->warehouse_id)->get();

        

        return view('livewire.warehouse.warehouse-processing.warehouse-processing-item-table', compact('dbWarehouseProcessing','dbWarehouseProcessingItems','dbWarehouseInventories'));
    }
}
