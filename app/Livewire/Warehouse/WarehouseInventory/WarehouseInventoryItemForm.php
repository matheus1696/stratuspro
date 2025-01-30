<?php

namespace App\Livewire\Warehouse\WarehouseInventory;

use App\Models\Business\BusinessContractSupplier;
use App\Models\Warehouse\WarehouseProduct;
use Livewire\Component;

class WarehouseInventoryItemForm extends Component
{
    public function render()
    {
        $dbBusinessSuppliers = BusinessContractSupplier::orderBy('supplier')->get();
        $dbWarehouseProducts = WarehouseProduct::orderBy('title')->get();

        return view('livewire.warehouse.warehouse-inventory.warehouse-inventory-item-form', compact('dbBusinessSuppliers', 'dbWarehouseProducts'));
    }
}
