<?php

namespace App\Livewire\Warehouse\StockControl;

use App\Models\Configuration\Company\CompanyEstablishment;
use App\Models\Warehouse\WarehouseStockControl;
use Livewire\Component;

class StockControlForm extends Component
{
    public $stockControlId;

    public function render()
    {        
        //Listagem de Dados
        $dbStockControl = NULL; 
        
        // Aplica as informações do estabelecimento caso existam.
        if ($this->stockControlId != NULL) {
            $dbStockControl = WarehouseStockControl::find($this->stockControlId);
        }

        $dbEstablishments = CompanyEstablishment::where('is_active',true)->orderBy('title')->get();

        return view('livewire.warehouse.stock-control.stock-control-form', compact('dbStockControl', 'dbEstablishments'));
    }
}
