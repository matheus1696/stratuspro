<x-pages.app>

    @slot('body')    
    
        <div>
            <x-title.page-title title="Estados" /> 
        </div>   
    
        <div>
            <livewire:configuration.region.region-state-table />
        </div>

    @endslot

</x-pages.app>