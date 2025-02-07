<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Solicitação de Suprimento" />
            <div class="flex gap-2">
                <x-button.link-primary href="{{ route('warehouse_processings.create', $warehouseStorage->id) }}" value="Abrir Solicitação" />
                <x-button.link-secondary href="{{ route('warehouse_inventories.index', $warehouseStorage->id) }}" value="Voltar" />
            </div>
        </x-header.header-group>
    
        <div>
            <livewire:warehouse.warehouse-processing.warehouse-processing-table :warehouseStorageId="$warehouseStorage->id"/>
        </div>

    @endslot

</x-pages.app>