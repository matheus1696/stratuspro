<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Lista de Almoxarifados" />
        </x-header.header-group>
    
        <div>
            <livewire:warehouse.warehouse-inventory.warehouse-inventory-table />
        </div>

    @endslot

</x-pages.app>