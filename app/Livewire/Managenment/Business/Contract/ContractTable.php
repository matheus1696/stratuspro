<?php

namespace App\Livewire\Managenment\Business\Contract;

use App\Models\Business\BusinessContract;
use App\Models\Business\BusinessContractStatus;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ContractTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $titulo = '';
    public $process = '';
    public $auction = '';
    public $start_date = '';
    public $end_date = '';
    public $status = 'Todos';

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['titulo', 'process','auction','start_date','end_date', 'perPage'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        // Inicia a consulta de usuários
        $query = BusinessContract::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->titulo)) { $query->orWhere('filter', 'like', '%' . strtolower($this->titulo) . '%'); }
        if (!empty($this->process)) { $query->orWhere('number_process_bidding', 'like', '%' . strtolower($this->process) . '%'); }
        if (!empty($this->auction)) { $query->orWhere('number_auction', 'like', '%' . strtolower($this->auction) . '%'); }
        if (!empty($this->start_date)) { $query->orWhere('start_date', 'like', '%' . strtolower($this->start_date) . '%'); }
        if (!empty($this->end_date)) { $query->orWhere('end_date', 'like', '%' . strtolower($this->end_date) . '%'); }
        if (!empty($this->status) && $this->status != "Todos") { $query->orWhere('status', $this->status); }

        // Paginando os resultados
        $dbContracts = $query->orderBy('title')->paginate(100);
        $dbStatuses = BusinessContractStatus::all();

        return view('livewire.managenment.business.contract.contract-table', compact('dbContracts', 'dbStatuses'));
    }
}
