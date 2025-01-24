<?php

namespace App\Livewire\Warehouse\WarehouseStorage;

use App\Models\Warehouse\WarehouseStorage;
use App\Models\Warehouse\WarehouseStorageType;
use Livewire\Component;

class WarehouseStorageTable extends Component
{
    public $search = '';
    public $perPage = '';
    public $typeId = '';

    public function render()
    {
        // Inicia a consulta de usuários
        $query = WarehouseStorage::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) { $query->where('filter', 'like', '%' . strtolower($this->search) . '%'); }
        if (!empty($this->typeId)) { $query->where('type_id', $this->typeId); }

        // Paginando os resultados
        $dbWarehouseStorages = $query->orderBy('title')->paginate($this->perPage);
        $dbWarehouseStorageTypes = WarehouseStorageType::orderBy('title')->get();

        return view('livewire.warehouse.warehouse-storage.warehouse-storage-table', compact('dbWarehouseStorages', 'dbWarehouseStorageTypes'));
    }
}
