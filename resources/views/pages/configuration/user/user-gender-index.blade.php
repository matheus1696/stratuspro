<x-pages.app>

    @slot('body')    
    
        <div>
            <x-title.page-title title="Gêneros" /> 
        </div>   
    
        <div>
            <livewire:configuration.user.user-gender-table />
        </div>

    @endslot

</x-pages.app>