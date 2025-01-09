<x-pages.app>

    @slot('body')    
    
        <div>
            <x-title.page-title title="Cidades" /> 
        </div>   
    
        <div>
            <livewire:configuration.region.region-city-table />
        </div>

    @endslot

</x-pages.app>