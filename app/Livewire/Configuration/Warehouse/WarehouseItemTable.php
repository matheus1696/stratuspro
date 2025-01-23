<?php

namespace App\Livewire\Configuration\Warehouse;

use App\Models\Configuration\Warehouse\WarehouseItem;
use Livewire\Component;

class WarehouseItemTable extends Component
{
    public $search = '';
    public $perPage = 10;

    public function render()
    {
        // Inicia a consulta de usuários
        $query = WarehouseItem::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) { $query->where('filter', 'like', '%' . strtolower($this->search) . '%'); }
        if (!empty($this->typeId)) { $query->where('type_id', $this->typeId); }

        // Paginando os resultados
        $dbWarehouseItems = $query->orderBy('title')->paginate($this->perPage);

        return view('livewire.configuration.warehouse.warehouse-item-table', compact('dbWarehouseItems'));
    }
}
