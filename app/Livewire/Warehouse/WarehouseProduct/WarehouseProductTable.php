<?php

namespace App\Livewire\Warehouse\WarehouseProduct;

use App\Models\Warehouse\WarehouseProduct;
use Livewire\Component;

class WarehouseProductTable extends Component
{
    public $search = '';
    public $perPage = 10;
    public $typeId; // A variável typeId não estava sendo definida.

    public function render()
    {
        // Inicializa a consulta de produtos
        $query = WarehouseProduct::query();

        // Aplica os filtros de busca, se existirem
        if ($this->search) { $query->where('filter', 'like', '%' . strtolower($this->search) . '%'); }

        if ($this->typeId) { $query->where('type_id', $this->typeId); }

        // Paginando os resultados
        $dbWarehouseProducts = $query->orderBy('title')->paginate($this->perPage);

        // Retorna a view com os resultados da consulta
        return view('livewire.warehouse.warehouse-product.warehouse-product-table', compact('dbWarehouseProducts'));
    }
}
