<?php

namespace App\Livewire\Warehouse\WarehouseProduct;

use App\Models\Warehouse\WarehouseProduct;
use App\Models\Warehouse\WarehouseProductCategory;
use Livewire\Component;

class WarehouseProductForm extends Component
{
    public $warehouseProductId;

    public function render()
    {
        //Listagem de Dados
        $dbWarehouseProduct = NULL; 
        
        // Aplica as informações do estabelecimento caso existam.
        if ($this->warehouseProductId != NULL) {
            $dbWarehouseProduct = WarehouseProduct::find($this->warehouseProductId);
        }

        $dbProductCategories = WarehouseProductCategory::orderBy('title')->get();

        return view('livewire.warehouse.warehouse-product.warehouse-product-form', compact('dbWarehouseProduct', 'dbProductCategories'));
    }
}
