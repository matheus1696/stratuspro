<?php

namespace App\Livewire\Warehouse\WarehouseInventory;

use App\Models\Warehouse\WarehouseInventory;
use App\Models\Warehouse\WarehouseProduct;
use App\Models\Warehouse\WarehouseProductCategory;
use Livewire\Component;

class WarehouseInventoryItemTable extends Component
{
    public $searchProduct;
    public $searchProductCategory;
    public $productId;
    public $dbWarehouseStorageId;

    public function render()
    {        
        $dbProductCategories = WarehouseProductCategory::all();

        // Inicia a query do inventário filtrando pelo almoxarifado selecionado
        $query = WarehouseInventory::where('warehouse_id', $this->dbWarehouseStorageId);

        // Se houver um termo de busca, tenta encontrar um produto correspondente
        if (!empty($this->searchProduct) || !empty($this->searchProductCategory)) {

            $querySearch = WarehouseProduct::query();
            
            if (!empty($this->searchProduct)) {
                $querySearch->where('filter', 'like', '%' . strtolower($this->searchProduct) . '%');
            }
            
            if (!empty($this->searchProductCategory)) {
                $querySearch->where('category_id', $this->searchProductCategory);
            }

            $productIds = $querySearch->pluck('id');

            if ($productIds->isNotEmpty()) {
                $query->whereIn('product_id', $productIds);
            } else {
                // Se não houver produtos encontrados, retorna uma coleção vazia
                $dbWarehouseInventories = collect();
                return view('livewire.warehouse.warehouse-inventory.warehouse-inventory-item-table', compact('dbWarehouseInventories','dbProductCategories'));
            }
        }

        // Obtém os resultados do inventário
        $dbWarehouseInventories = $query->get();

        return view('livewire.warehouse.warehouse-inventory.warehouse-inventory-item-table', compact('dbWarehouseInventories','dbProductCategories'));
    }
}
