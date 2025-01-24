<?php

namespace App\Livewire\Warehouse\WarehouseInventory;

use App\Models\Warehouse\WarehousePermission;
use App\Models\Warehouse\WarehouseStorage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WarehouseInventoryTable extends Component
{
    public $search;

    public function oneStorage($url){
        return redirect()->to($url);
    }

    public function render()
    {
        // Obtém os IDs dos almoxarifados que o usuário tem permissão de acessar
        $userPermission = WarehousePermission::where('user_id', Auth::id())->pluck('warehouse_id');

        // Inicia a query para os almoxarifados
        $dbWarehouseStorageQuery = WarehouseStorage::query();
        $dbWarehouseStorageQuery->whereIn('id', $userPermission);

        // Adiciona filtro de pesquisa, se existir
        if (!empty($this->search)) {
            $dbWarehouseStorageQuery->where('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        // Executa a query para obter os resultados
        $dbWarehouseStorages = $dbWarehouseStorageQuery->get();

        // Se o usuário tiver acesso a apenas um almoxarifado, emite um evento de redirecionamento
        if ($dbWarehouseStorages->count() === 1 && $this->search === NULL) {
            $this->oneStorage(route('warehouse_inventories.show', $dbWarehouseStorages->first()->id));
        }

        return view('livewire.warehouse.warehouse-inventory.warehouse-inventory-table', compact('dbWarehouseStorages'));
    }
}
