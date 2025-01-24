<?php

namespace App\Livewire\Warehouse\WarehouseProduct;

use App\Models\Warehouse\WarehouseProduct;
use Livewire\Component;

class WarehouseProductTable extends Component
{
    public $search = '';
    public $perPage = 10;

    public function render()
    {
        // Inicia a consulta de usuários
        $query = WarehouseProduct::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) { $query->where('filter', 'like', '%' . strtolower($this->search) . '%'); }
        if (!empty($this->typeId)) { $query->where('type_id', $this->typeId); }

        // Paginando os resultados
        $dbWarehouseProducts = $query->orderBy('title')->paginate($this->perPage);

        return view('livewire.warehouse.warehouse-product.warehouse-product-table', compact('dbWarehouseProducts'));
    }
}
