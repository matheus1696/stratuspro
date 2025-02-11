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
        // Inicializa a variável para armazenar o produto
        $dbWarehouseProduct = null;

        // Caso exista um ID de produto, carrega os dados do produto
        if ($this->warehouseProductId) {
            $dbWarehouseProduct = WarehouseProduct::find($this->warehouseProductId);
        }

        // Carrega todas as categorias de produtos, ordenadas pelo título
        $dbProductCategories = WarehouseProductCategory::orderBy('title')->get();

        // Retorna a view com os dados do produto e as categorias
        return view('livewire.warehouse.warehouse-product.warehouse-product-form', compact('dbWarehouseProduct', 'dbProductCategories'));
    }
}
