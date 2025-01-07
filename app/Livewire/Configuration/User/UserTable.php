<?php

namespace App\Livewire\Configuration\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UserTable extends Component
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
        $query = User::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) {
            $query->orWhere('filter', 'like', '%' . strtolower($this->search) . '%');
            $query->orWhere('email', 'like', '%' . strtolower($this->search) . '%');
        }

        // Paginando os resultados
        $dbUsers = $query->orderBy('name')->paginate($this->perPage);

        return view('livewire.configuration.user.user-table', compact('dbUsers'));
    }
}
