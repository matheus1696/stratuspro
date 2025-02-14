<?php

namespace App\Livewire\Warehouse\WarehouseInventory;

use App\Models\Configuration\Company\CompanyEstablishment;
use App\Models\Warehouse\WarehousePermission;
use App\Models\Warehouse\WarehouseStorage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WarehouseInventoryTable extends Component
{
    public $searchWarehouse;
    public $searchEstablishment;

    public function render()
    {
        // Obtém os IDs dos almoxarifados que o usuário tem permissão de acessar
        $userPermission = WarehousePermission::where('user_id', Auth::id())->pluck('warehouse_id');

        // Inicia a query para os almoxarifados
        $dbWarehouseStorageQuery = WarehouseStorage::query();
        $dbWarehouseStorageQuery->whereIn('id', $userPermission);

        // Adiciona filtro de pesquisa, se existir
        if (!empty($this->searchWarehouse)) {
            $dbWarehouseStorageQuery->where('filter', 'like', '%' . strtolower($this->searchWarehouse) . '%');
        }

        // Adiciona filtro de pesquisa, se existir
        if (!empty($this->searchEstablishment)) {
            $dbWarehouseStorageQuery->where('establishment_id', $this->searchEstablishment);
        }

        // Executa a query para obter os resultados
        $dbWarehouseStorages = $dbWarehouseStorageQuery->get();

        $dbEstablishments = CompanyEstablishment::orderBy('title')->get();

        return view('livewire.warehouse.warehouse-inventory.warehouse-inventory-table', compact('dbWarehouseStorages', 'dbEstablishments'));
    }
}
