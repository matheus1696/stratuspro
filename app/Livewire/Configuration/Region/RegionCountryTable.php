<?php

namespace App\Livewire\Configuration\Region;

use App\Models\Configuration\Region\RegionCountry;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class RegionCountryTable extends Component
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
        $query = RegionCountry::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) {
            $query->orWhere('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        // Paginando os resultados
        $dbRegionCountries = $query->orderBy('title')->paginate($this->perPage);

        return view('livewire.configuration.region.region-country-table', compact('dbRegionCountries'));
    }
}
