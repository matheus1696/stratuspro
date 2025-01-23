<?php

namespace App\Livewire\Warehouse\StockControl;

use App\Models\Warehouse\WarehouseStockControl;
use Livewire\Component;

class StockControlShow extends Component
{
    public $stockControlId;

    public function render()
    {
        $dbStockControl = WarehouseStockControl::find($this->stockControlId);

        return view('livewire.warehouse.stock-control.stock-control-show', compact('dbStockControl'));
    }
}
