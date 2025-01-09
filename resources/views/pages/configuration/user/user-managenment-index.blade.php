<x-pages.app>

    @slot('body')    
    
        <div>
            <x-title.page-title title="Gestão de Usuários" /> 
        </div>   
    
        <div>
            <livewire:configuration.user.user-table />
        </div>

    @endslot

</x-pages.app>