<?php

namespace App\Livewire\Managenment\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        $dbPermissions = Permission::all();
        $dbRoles = Role::with('permissions')->get();

        return view('livewire.managenment.user.user-table', compact('dbUsers', 'dbRoles' ,'dbPermissions'));
    }
}
