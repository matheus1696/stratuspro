<?php

namespace App\Livewire\Warehouse\WarehouseStorage;

use App\Models\User;
use App\Models\Warehouse\WarehousePermission;
use App\Models\Warehouse\WarehouseStorage;
use Livewire\Component;

class WarehouseStorageShow extends Component
{
    public $warehouseStorageId;
    public $search;

    public function render()
    {
        $dbWarehouseStorage = WarehouseStorage::find($this->warehouseStorageId);

        // Obtém as permissões associadas ao almoxarifado
        $dbUserPermissions = WarehousePermission::with('user')
            ->join('users', 'warehouse_permissions.user_id', '=', 'users.id')
            ->orderBy('users.name')
            ->where('warehouse_id', $this->warehouseStorageId)
            ->get();

        // Obtém usuários sem permissões do almoxarifado
        // IDs dos usuários que já possuem permissão
        $excludedUserIds = $dbUserPermissions->pluck('user_id');
        
        // Inicia a consulta de usuários
        $dbUsersQuery = User::query()->whereNotIn('id', $excludedUserIds);

        //Filtro de Busca
        if (!empty($this->search)) { $dbUsersQuery->where('filter', 'like', '%' . strtolower($this->search) . '%'); }

        //Retorno de Usuários sem Permissão
        $dbUsers = $dbUsersQuery->orderBy('name')->get();
        return view('livewire.warehouse.warehouse-storage.warehouse-storage-show', compact('dbWarehouseStorage', 'dbUsers', 'dbUserPermissions'));
    }
}
