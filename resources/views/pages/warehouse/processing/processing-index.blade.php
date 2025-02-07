<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Processamento para Envio" />
            <div>
                <x-button.link-primary href="{{ route('warehouse_processings.create', $warehouseStorage->id) }}" value="Abrir Solicitação" />
            </div>
        </x-header.header-group>
    
        <div>
            <livewire:warehouse.warehouse-processing.warehouse-processing-table :warehouseStorageId="$warehouseStorage->id"/>
        </div>

    @endslot

</x-pages.app>