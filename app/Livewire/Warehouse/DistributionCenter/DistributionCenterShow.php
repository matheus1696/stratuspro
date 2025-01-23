<?php

namespace App\Livewire\Warehouse\DistributionCenter;

use App\Models\Warehouse\WarehouseDistributionCenter;
use Livewire\Component;

class DistributionCenterShow extends Component
{
    public $distributionCenterId;

    public function render()
    {
        $dbDistributionCenter = WarehouseDistributionCenter::find($this->distributionCenterId);

        return view('livewire.warehouse.distribution-center.distribution-center-show', compact('dbDistributionCenter'));
    }
}
