<?php

namespace App\Livewire\Configuration\Warehouse;

use App\Models\Configuration\Warehouse\WarehouseItem;
use Livewire\Component;

class WarehouseItemForm extends Component
{
    public $warehouseId;

    public function render()
    {
        //Listagem de Dados
        $dbWarehouseItem = NULL; 
        
        // Aplica as informações do estabelecimento caso existam.
        if ($this->warehouseId != NULL) {
            $dbWarehouseItem = WarehouseItem::find($this->warehouseId);
        }

        return view('livewire.configuration.warehouse.warehouse-item-form', compact('dbWarehouseItem'));
    }
}
