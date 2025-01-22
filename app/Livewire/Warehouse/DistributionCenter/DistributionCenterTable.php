<?php

namespace App\Livewire\Warehouse\DistributionCenter;

use App\Models\Warehouse\WarehouseDistributionCenter;
use Livewire\Component;

class DistributionCenterTable extends Component
{    
    public $search = '';
    public $perPage = '';

    public function render()
    {
        // Inicia a consulta de usuários
        $query = WarehouseDistributionCenter::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) {
            $query->orWhere('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        // Paginando os resultados
        $dbDistributionCenters = $query->orderBy('title')->paginate($this->perPage);

        return view('livewire.warehouse.distribution-center.distribution-center-table', compact('dbDistributionCenters'));
    }
}
