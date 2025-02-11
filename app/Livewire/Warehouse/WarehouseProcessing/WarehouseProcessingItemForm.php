<?php

namespace App\Livewire\Warehouse\WarehouseProcessing;

use App\Models\Warehouse\WarehouseInventory;
use App\Models\Warehouse\WarehouseProcessing;
use Livewire\Component;

class WarehouseProcessingItemForm extends Component
{
    public $dbWarehouseProcessingId;
    public $product_id = "";
    public $current_inventory;

    public function render()
    {
        $dbWarehouseProcessing = WarehouseProcessing::find($this->dbWarehouseProcessingId);
        $dbWarehouseInventories = WarehouseInventory::where('warehouse_id', $dbWarehouseProcessing->warehouse_id)->get();

        if (!empty($this->product_id)) {
            $this->current_inventory = WarehouseInventory::where('warehouse_id', $dbWarehouseProcessing->warehouse_id)
                ->where('product_id', $this->product_id)->first()->quantity;
        }

        return view('livewire.warehouse.warehouse-processing.warehouse-processing-item-form', compact('dbWarehouseInventories'));
    }
}
