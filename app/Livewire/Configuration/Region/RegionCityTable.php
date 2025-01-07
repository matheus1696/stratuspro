<?php

namespace App\Livewire\Configuration\Region;

use App\Models\Region\RegionCity;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class RegionCityTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';
    public $perPage = 50;

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['search', 'perPage'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        // Inicia a consulta de usuários
        $query = RegionCity::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) {
            $query->orWhere('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        // Paginando os resultados
        $dbRegionCities = $query->orderBy('state_id')->orderBy('title')->paginate($this->perPage);

        return view('livewire.configuration.region.region-city-table', compact('dbRegionCities'));
    }
}
