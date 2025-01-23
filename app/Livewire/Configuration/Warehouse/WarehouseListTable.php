<?php

namespace App\Livewire\Configuration\Warehouse;

use App\Models\Configuration\Warehouse\WarehouseList;
use App\Models\Configuration\Warehouse\WarehouseType;
use Livewire\Component;

class WarehouseListTable extends Component
{
    public $search = '';
    public $perPage = '';
    public $typeId = '';

    public function render()
    {
        // Inicia a consulta de usuários
        $query = WarehouseList::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) { $query->where('filter', 'like', '%' . strtolower($this->search) . '%'); }
        if (!empty($this->typeId)) { $query->where('type_id', $this->typeId); }

        // Paginando os resultados
        $dbWarehouses = $query->orderBy('title')->paginate($this->perPage);
        $dbWarehouseTypes = WarehouseType::orderBy('title')->get();

        return view('livewire.configuration.warehouse.warehouse-list-table', compact('dbWarehouses', 'dbWarehouseTypes'));
    }
}
