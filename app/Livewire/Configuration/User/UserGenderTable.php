<?php

namespace App\Livewire\Configuration\User;

use App\Models\Configuration\User\UserGender;
use Livewire\Component;

class UserGenderTable extends Component
{    
    public $search = '';

    public function render()
    {
        // Inicia a consulta de usuários
        $query = UserGender::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) {
            $query->orWhere('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        // Paginando os resultados
        $dbUserGenders = $query->orderBy('title')->get();

        return view('livewire.configuration.user.user-gender-table', compact('dbUserGenders'));
    }
}
