<?php

namespace App\Livewire\Warehouse\DistributionCenter;

use App\Models\Configuration\Company\CompanyEstablishment;
use App\Models\Warehouse\WarehouseDistributionCenter;
use Livewire\Component;

class DistributionCenterForm extends Component
{
    public $distributionCenterId;

    public function render()
    {        
        //Listagem de Dados
        $dbDistributionCenter = NULL; 
        
        // Aplica as informações do estabelecimento caso existam.
        if ($this->distributionCenterId != NULL) {
            $dbDistributionCenter = WarehouseDistributionCenter::find($this->distributionCenterId);
        }

        $dbEstablishments = CompanyEstablishment::where('is_active',true)->orderBy('title')->get();

        return view('livewire.warehouse.distribution-center.distribution-center-form', compact('dbDistributionCenter', 'dbEstablishments'));
    }
}
