<x-pages.app>
    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="{{ $warehouseStorage->title }}" />
            <div class="flex gap-2">
                <x-button.link-primary href="{{ route('warehouse_inventories.entryCreate', $warehouseStorage->id) }}" value="Entrada de Produtos" />
                <x-button.link-tertiary href="{{ route('warehouse_processings.index', $warehouseStorage->id) }}" value="Saída de Produtos" class="bg-red-600 hover:bg-red-700 text-white hover:text-white"/>
            </div>
        </x-header.header-group>

        <div>
            <livewire:warehouse.warehouse-inventory.warehouse-inventory-item-table :dbWarehouseStorageId="$warehouseStorage->id" />
        </div>
    @endslot
</x-pages.app>
