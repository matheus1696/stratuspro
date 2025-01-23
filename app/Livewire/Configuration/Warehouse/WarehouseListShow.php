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
        
        // Inicia a consulta de usuários
        $dbUsersQuery = User::query();
        if (!empty($this->search)) { $dbUsersQuery->where('filter', 'like', '%' . strtolower($this->search) . '%'); }
        $dbUsers = $dbUsersQuery->orderBy('name')->get();

        $dbUserPermissions = WarehousePermission::where('warehouse_id', $this->warehouseId)->get();

        return view('livewire.configuration.warehouse.warehouse-list-show', compact('dbWarehouse', 'dbUsers', 'dbUserPermissions'));
    }
}
