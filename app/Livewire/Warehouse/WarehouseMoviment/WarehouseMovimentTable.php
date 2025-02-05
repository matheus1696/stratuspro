<?php

namespace App\Livewire\Warehouse\WarehouseMoviment;

use App\Models\Warehouse\WarehouseMoviment;
use Livewire\Component;

class WarehouseMovimentTable extends Component
{
    public $search;
    public $perPage = 10;
    public $dbWarehouseStorageId;

    public function render()
    {
        // Inicia a query do inventário filtrando pelo almoxarifado selecionado
        $dbWarehouseMoviments = WarehouseMoviment::where('warehouse_id', $this->dbWarehouseStorageId)
            ->orderBy('created_at', 'DESC')    
            ->paginate($this->perPage);

        return view('livewire.warehouse.warehouse-moviment.warehouse-moviment-table', compact('dbWarehouseMoviments'));
    }
}
