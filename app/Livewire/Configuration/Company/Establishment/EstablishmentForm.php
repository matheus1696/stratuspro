<?php

namespace App\Livewire\Configuration\Company\Establishment;

use App\Models\Configuration\Company\CompanyEstablishment;
use App\Models\Configuration\Company\CompanyFinancialBlock;
use App\Models\Configuration\Region\RegionCity;
use App\Models\Configuration\Region\RegionCountry;
use App\Models\Configuration\Region\RegionState;
use Livewire\Component;

class EstablishmentForm extends Component
{
    public $establishmentId;
    public $selectedCountry = 0;
    public $selectedState = 0;
    public $selectedCity = 0;

    public function mount(){
        // Aplica as informações do estabelecimento caso existam.
        if ($this->establishmentId != NULL) {
            $dbEstablishment = CompanyEstablishment::find($this->establishmentId);
            $this->selectedCountry = $dbEstablishment->country_id;
            $this->selectedState = $dbEstablishment->state_id;
            $this->selectedCity = $dbEstablishment->city_id;
        }
    }

    public function updating()
    {
        $this->selectedState = 0;
        $this->selectedCity = 0;
    }

    public function render()
    {
        //Listagem de Dados
        $dbEstablishment = NULL; 

        // Aplica as informações do estabelecimento caso existam.
        if ($this->establishmentId != NULL) {
            $dbEstablishment = CompanyEstablishment::find($this->establishmentId);
        }

        $dbRegionStates = [];
        $dbRegionCities = [];

        // Aplica os filtros do estado selecionado.
        if (!empty($this->selectedCountry)) {
            $dbRegionStates = RegionState::where('country_id', $this->selectedCountry)->orderBy('title')->get();
        }

        // Aplica os filtros do estado selecionado.
        if (!empty($this->selectedState)) {
            $dbRegionCities = RegionCity::where('state_id', $this->selectedState)->orderBy('title')->get();
        }

        $dbRegionCountries = RegionCountry::where('is_active',true)->orderBy('title')->get();
        $dbCompanyFinancialBlocks = CompanyFinancialBlock::where('is_active',true)->orderBy('title')->get();

        return view('livewire.configuration.company.establishment.establishment-form', compact('dbEstablishment', 'dbRegionCountries', 'dbRegionStates', 'dbRegionCities', 'dbCompanyFinancialBlocks'));
    }
}
