<?php

namespace App\Livewire\Configuration\Region;

use App\Models\Region\RegionState;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class RegionStateTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';
    public $perPage = 10;

    public function updatedSearch(){
        $this->resetPage();
    }

    public function render()
    {
        // Inicia a consulta de usuários
        $query = RegionState::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) {
            $query->orWhere('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        // Paginando os resultados
        $dbRegionStates = $query->orderBy('country_id')->orderBy('name')->paginate($this->perPage);

        return view('livewire.configuration.region.region-state-table', compact('dbRegionStates'));
    }
}
