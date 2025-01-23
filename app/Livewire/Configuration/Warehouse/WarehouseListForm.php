<?php

namespace App\Livewire\Configuration\Warehouse;

use App\Models\Configuration\Company\CompanyEstablishment;
use App\Models\Configuration\Warehouse\WarehouseList;
use App\Models\Configuration\Warehouse\WarehouseType;
use Livewire\Component;

class WarehouseListForm extends Component
{
    public $warehouseId;

    public function render()
    {
        //Listagem de Dados
        $dbWarehouse = NULL; 
        
        // Aplica as informações do estabelecimento caso existam.
        if ($this->warehouseId != NULL) {
            $dbWarehouse = WarehouseList::find($this->warehouseId);
        }
        
        $dbWarehouseTypes = WarehouseType::where('is_active',true)->orderBy('title')->get();
        $dbEstablishments = CompanyEstablishment::where('is_active',true)->orderBy('title')->get();

        return view('livewire.configuration.warehouse.warehouse-list-form', compact('dbWarehouse', 'dbWarehouseTypes', 'dbEstablishments'));
    }
}
