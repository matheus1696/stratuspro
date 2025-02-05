<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Processamento" />
            <div>
                <x-button.link-primary href="{{ route('warehouse_storages.create') }}" value="Abrir Solicitação" />
            </div>
        </x-header.header-group>
    
        <div>
            <livewire:warehouse.warehouse-storage.warehouse-storage-table />
        </div>

    @endslot

</x-pages.app>