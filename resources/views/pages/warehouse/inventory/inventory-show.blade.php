<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="{{ $warehouseStorage->title }}" />
            <div>
                <x-button.link-primary href="{{ route('warehouse_inventories.entryCreate', $warehouseStorage->id) }}" value="Entrada" />
            </div>
        </x-header.header-group>
    
        <div>
            <livewire:warehouse.warehouse-inventory.warehouse-inventory-item-table :dbWarehouseStorageId='$warehouseStorage->id' />
        </div>
    @endslot

</x-pages.app>