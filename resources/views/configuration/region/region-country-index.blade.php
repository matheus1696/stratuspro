<x-pages.app>

    @slot('body')    
    
        <div>
            <x-title.page-title title="Paises" /> 
        </div>   
    
        <div>
            <livewire:configuration.region.region-country-table />
        </div>

    @endslot

</x-pages.app>