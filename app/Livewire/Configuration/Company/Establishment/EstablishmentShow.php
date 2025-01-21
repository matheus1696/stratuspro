<?php

namespace App\Livewire\Configuration\Company\Establishment;

use App\Models\Configuration\Company\CompanyEstablishment;
use Livewire\Component;

class EstablishmentShow extends Component
{
    public $establishmentId;

    public function render()
    {
        $dbEstablishment = CompanyEstablishment::find($this->establishmentId);

        return view('livewire.configuration.company.establishment.establishment-show', compact('dbEstablishment'));
    }
}
