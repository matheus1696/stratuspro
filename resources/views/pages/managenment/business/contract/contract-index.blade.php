<x-pages.app>

    @slot('body')    
    
        <div>
            <x-title.page-title title="Gestão de Contratos" /> 
        </div>   
    
        <div>
            <livewire:managenment.business.contract.contract-table />
        </div>

    @endslot

</x-pages.app>