<?php

namespace App\Livewire\Configuration\Warehouse;

use App\Models\Configuration\Warehouse\WarehouseList;
use App\Models\Configuration\Warehouse\WarehousePermission;
use App\Models\User;
use Livewire\Component;

class WarehouseListShow extends Component
{
    public $warehouseId;
    public $search;

    public function render()
    {
        $dbWarehouse = WarehouseList::find($this->warehouseId);

        // Obtém as permissões associadas ao almoxarifado
        $dbUserPermissions = WarehousePermission::with('user')
            ->join('users', 'warehouse_permissions.user_id', '=', 'users.id')
            ->orderBy('users.name')
            ->where('warehouse_id', $this->warehouseId)
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

        return view('livewire.configuration.warehouse.warehouse-list-show', compact('dbWarehouse', 'dbUsers', 'dbUserPermissions'));
    }
}
