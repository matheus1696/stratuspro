<?php

namespace App\Livewire\Configuration\Company\Establishment;

use App\Models\Configuration\Company\CompanyEstablishment;
use App\Models\Configuration\Company\CompanyFinancialBlock;
use App\Models\Configuration\Region\RegionCity;
use App\Models\Configuration\Region\RegionState;
use Livewire\Component;

class EstablishmentForm extends Component
{
    public $dbEstablishment;
    public $selectedState = 0;
    public $selectedCity = 0;

    public function mount(){
        // Aplica as informações do estabelecimento caso existam.
        if ($this->dbEstablishment != NULL) {
            $db = CompanyEstablishment::find($this->dbEstablishment);
            $this->selectedState = $db->state_id;
            $this->selectedCity = $db->city_id;
        }
    }

    public function updating()
    {
        $this->selectedCity = 0;
    }

    public function render()
    {
        //Listagem de Dados
        $db = NULL; 

        // Aplica as informações do estabelecimento caso existam.
        if ($this->dbEstablishment != NULL) {
            $db = CompanyEstablishment::find($this->dbEstablishment);
        }

        $dbRegionCities = [];

        // Aplica os filtros do estado selecionado.
        if (!empty($this->selectedState)) {
            $dbRegionCities = RegionCity::where('state_id', $this->selectedState)->orderBy('city')->get();
        }        

        $dbRegionStates = RegionState::where('status',true)->orderBy('state')->get();
        $dbCompanyFinancialBlocks = CompanyFinancialBlock::where('status',true)->orderBy('title')->get();

        return view('livewire.configuration.company.establishment.establishment-form', compact('db', 'dbRegionStates', 'dbRegionCities', 'dbCompanyFinancialBlocks'));
    }
}
