<?php

namespace App\Livewire\Warehouse\WarehouseStorage;

use App\Models\Warehouse\WarehouseStorage;
use App\Models\Warehouse\WarehouseStorageType;
use Livewire\Component;

class WarehouseStorageTable extends Component
{
    public $search = '';
    public $perPage = 10;
    public $typeId = '';

    public function render()
    {
        // Inicia a consulta com o modelo WarehouseStorage
        $query = WarehouseStorage::query();

        // Aplica os filtros de busca se os valores existirem
        if ($this->search) { $query->where('filter', 'like', '%' . strtolower($this->search) . '%'); }

        if ($this->typeId) { $query->where('type_id', $this->typeId); }

        // Paginando os resultados de acordo com o valor de perPage
        $dbWarehouseStorages = $query->orderBy('title')->paginate($this->perPage);

        // Obtendo todos os tipos de almoxarifados para os filtros
        $dbWarehouseStorageTypes = WarehouseStorageType::orderBy('title')->get();

        // Retorna a visualização com as variáveis passadas para a view
        return view('livewire.warehouse.warehouse-storage.warehouse-storage-table', [
            'dbWarehouseStorages' => $dbWarehouseStorages,
            'dbWarehouseStorageTypes' => $dbWarehouseStorageTypes,
        ]);
    }
}

