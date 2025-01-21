<?php

namespace App\Livewire\Configuration\Company\Establishment;

use App\Models\Configuration\Company\CompanyEstablishment;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class EstablishmentTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';
    public $perPage = 10;

    public function updating(){
        $this->resetPage();
    }

    public function render()
    {
        // Inicia a consulta de usuários
        $query = CompanyEstablishment::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) {
            $query->where('code', 'like', '%' . strtolower($this->search) . '%');
            $query->orWhere('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        // Paginando os resultados
        $dbEstablishments = $query->orderBy('is_active','DESC')
            ->orderBy('title')
            ->with('FinancialBlock')
            ->with('RegionCity')
            ->with('RegionState')
            ->with('RegionCountry')
            ->paginate($this->perPage);

        return view('livewire.configuration.company.establishment.establishment-table', compact('dbEstablishments'));
    }
}
