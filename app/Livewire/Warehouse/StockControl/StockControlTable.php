<?php

namespace App\Livewire\Warehouse\StockControl;

use App\Models\Warehouse\WarehouseStockControl;
use Livewire\Component;

class StockControlTable extends Component
{    
    public $search = '';
    public $perPage = '';

    public function render()
    {
        // Inicia a consulta de usuários
        $query = WarehouseStockControl::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) {
            $query->orWhere('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        // Paginando os resultados
        $dbStockControls = $query->orderBy('title')->paginate($this->perPage);

        return view('livewire.warehouse.stock-control.stock-control-table', compact('dbStockControls'));
    }
}
