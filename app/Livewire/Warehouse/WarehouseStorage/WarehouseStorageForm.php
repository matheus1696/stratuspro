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
        // Inicializa a variável com valor nulo
        $dbWarehouseStorage = null;

        // Obtém o almoxarifado se o ID for fornecido
        if ($this->warehouseStorageId) {
            $dbWarehouseStorage = WarehouseStorage::find($this->warehouseStorageId);
        }

        // Obtém os tipos de almoxarifado ativos e ordenados
        $dbWarehouseStorageTypes = WarehouseStorageType::where('is_active',true)->orderBy('title')->get();

        // Obtém os estabelecimentos ativos e ordenados
        $dbEstablishments = CompanyEstablishment::where('is_active',true)->orderBy('title')->get();

        // Retorna a view com os dados necessários
        return view('livewire.warehouse.warehouse-storage.warehouse-storage-form', [
            'dbWarehouseStorage' => $dbWarehouseStorage,
            'dbWarehouseStorageTypes' => $dbWarehouseStorageTypes,
            'dbEstablishments' => $dbEstablishments,
        ]);
    }
}
