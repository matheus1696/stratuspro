<?php

namespace App\Livewire\Warehouse\WarehouseStorage;

use App\Models\User;
use App\Models\Warehouse\WarehousePermission;
use App\Models\Warehouse\WarehouseStorage;
use Livewire\Component;

class WarehouseStorageShow extends Component
{
    public $warehouseStorageId;
    public $search = '';

    public function render()
    {
        // Obtém o almoxarifado pelo ID
        $dbWarehouseStorage = WarehouseStorage::findOrFail($this->warehouseStorageId);

        // Obtém as permissões associadas ao almoxarifado, ordenadas por nome de usuário
        $dbUserPermissions = WarehousePermission::with('user')
            ->join('users', 'warehouse_permissions.user_id', '=', 'users.id')
            ->where('warehouse_id', $this->warehouseStorageId)
            ->orderBy('users.name')
            ->get();

        // IDs dos usuários com permissão para este almoxarifado
        $excludedUserIds = $dbUserPermissions->pluck('user_id');

        // Consulta os usuários que não têm permissão para este almoxarifado
        $dbUsersQuery = User::whereNotIn('id', $excludedUserIds);

        // Aplica filtro de busca se houver
        if ($this->search) {
            $dbUsersQuery->where('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        // Obtém os usuários restantes, ordenados por nome
        $dbUsers = $dbUsersQuery->orderBy('name')->get();

        // Retorna a view com as variáveis necessárias
        return view('livewire.warehouse.warehouse-storage.warehouse-storage-show', [
            'dbWarehouseStorage' => $dbWarehouseStorage,
            'dbUsers' => $dbUsers,
            'dbUserPermissions' => $dbUserPermissions,
        ]);
    }
}
