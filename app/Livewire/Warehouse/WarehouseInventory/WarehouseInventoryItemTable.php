<?php

namespace App\Livewire\Warehouse\WarehouseInventory;

use App\Models\Warehouse\WarehouseInventory;
use App\Models\Warehouse\WarehouseProduct;
use Livewire\Component;

class WarehouseInventoryItemTable extends Component
{
    public $search;
    public $productId;
    public $dbWarehouseStorageId;

    public function render()
    {
        // Inicia a query do inventário filtrando pelo almoxarifado selecionado
        $query = WarehouseInventory::where('warehouse_id', $this->dbWarehouseStorageId);

        // Se houver um termo de busca, tenta encontrar um produto correspondente
        if (!empty($this->search)) {
            $productIds = WarehouseProduct::where('filter', 'like', '%' . strtolower($this->search) . '%')
                ->pluck('id'); // Obtém todos os IDs de produtos correspondentes

            if ($productIds->isNotEmpty()) {
                $query->whereIn('product_id', $productIds);
            } else {
                // Se não houver produtos encontrados, retorna uma coleção vazia
                $dbWarehouseInventories = collect();
                return view('livewire.warehouse.warehouse-inventory.warehouse-inventory-item-table', compact('dbWarehouseInventories'));
            }
        }

        // Obtém os resultados do inventário
        $dbWarehouseInventories = $query->get();

        return view('livewire.warehouse.warehouse-inventory.warehouse-inventory-item-table', compact('dbWarehouseInventories'));
    }
}
