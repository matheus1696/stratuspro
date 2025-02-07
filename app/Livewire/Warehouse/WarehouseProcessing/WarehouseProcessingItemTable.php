<?php

namespace App\Livewire\Warehouse\WarehouseProcessing;

use App\Models\Warehouse\WarehouseProcessingItem;
use Livewire\Component;

class WarehouseProcessingItemTable extends Component
{
    public $dbWarehouseProcessingId;

    public function render()
    {
        $dbWarehouseProcessingItems = WarehouseProcessingItem::where('processing_id', $this->dbWarehouseProcessingId)->get();

        return view('livewire.warehouse.warehouse-processing.warehouse-processing-item-table', compact('dbWarehouseProcessingItems'));
    }
}
