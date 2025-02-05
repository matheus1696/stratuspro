<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="{{ $warehouseStorage->title }}" />
            <div class="flex gap-2">
                <x-button.link-primary href="{{ route('warehouse_inventories.entryCreate', $warehouseStorage->id) }}" value="Entrada" />
                <x-button.link-secondary href="{{ route('warehouse_processings.index', $warehouseStorage->id) }}" value="Saída" class="bg-red-600 hover:bg-red-700"/>
            </div>
        </x-header.header-group>
    
        <div>
            <livewire:warehouse.warehouse-inventory.warehouse-inventory-item-table :dbWarehouseStorageId='$warehouseStorage->id' />
        </div>
    @endslot

</x-pages.app>