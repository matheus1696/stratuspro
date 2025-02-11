<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Almoxarifados" />
            <div class="flex gap-2">
                <x-button.link-primary href="{{ route('warehouse_storages.create') }}" value="Adicionar Almoxarifado" />
            </div>
        </x-header.header-group>

        <div>
            <livewire:warehouse.warehouse-storage.warehouse-storage-table />
        </div>
    @endslot

</x-pages.app>
