<?php

namespace App\Livewire\Warehouse\WarehouseStorage;

use App\Models\Configuration\Company\CompanyEstablishment;
use App\Models\Warehouse\WarehouseStorage;
use App\Models\Warehouse\WarehouseStorageType;
use Livewire\Component;

class WarehouseStorageForm extends Component
{
    public $warehouseStorageId;

    public function render()
    {
        //Listagem de Dados
        $dbWarehouseStorage = NULL; 
        
        // Aplica as informações do estabelecimento caso existam.
        if ($this->warehouseStorageId != NULL) {
            $dbWarehouseStorage = WarehouseStorage::find($this->warehouseStorageId);
        }
        
        $dbWarehouseStorageTypes = WarehouseStorageType::where('is_active',true)->orderBy('title')->get();
        $dbEstablishments = CompanyEstablishment::where('is_active',true)->orderBy('title')->get();

        return view('livewire.warehouse.warehouse-storage.warehouse-storage-form', compact('dbWarehouseStorage', 'dbWarehouseStorageTypes', 'dbEstablishments'));
    }
}
