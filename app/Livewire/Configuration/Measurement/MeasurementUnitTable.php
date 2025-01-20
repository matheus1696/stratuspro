<?php

namespace App\Livewire\Configuration\Measurement;

use App\Models\Configuration\Measurement\MeasurementUnit;
use Livewire\Component;

class MeasurementUnitTable extends Component
{
    public $search = '';

    public function render()
    {
        // Inicia a consulta de usuários
        $query = MeasurementUnit::query();

        // Aplica os filtros de busca, se existirem
        if (!empty($this->search)) {
            $query->orWhere('filter', 'like', '%' . strtolower($this->search) . '%');
        }

        // Paginando os resultados
        $dbMeasurementUnits = $query->orderBy('title')->get();

        return view('livewire.configuration.measurement.measurement-unit-table', compact('dbMeasurementUnits'));
    }
}
