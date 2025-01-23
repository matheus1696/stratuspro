<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Lista de Almoxarifado" />
            <div>
                <x-button.link-primary href="{{ route('warehouses.create') }}" value="Novo Almoxarifado" />
            </div>
        </x-header.header-group>
    
        <div>
            <livewire:configuration.warehouse.warehouse-list-table />
        </div>

    @endslot

</x-pages.app>