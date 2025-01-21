<x-pages.app>

    @slot('body')  
        <x-header.header-group>
            <x-header.header-title title="Lista de Estabelecimento" />
        </x-header.header-group>
    
        <div>
            <livewire:configuration.company.establishment.establishment-table />
        </div>

    @endslot

</x-pages.app>