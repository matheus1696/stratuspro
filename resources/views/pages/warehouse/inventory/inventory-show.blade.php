<x-pages.app>
    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="{{ $warehouseStorage->title }}" />
            <div class="flex gap-2">
                <x-button.btn-dropdown href="{{ route('warehouse_inventories.entryCreate', $warehouseStorage->id) }}" >
                    <x-button.btn-dropdown-item href="{{ route('warehouse_inventories.entryCreate', $warehouseStorage->id) }}" value="Entrada de Produtos" icon="fas fa-arrow-alt-circle-right" class="text-blue-500 hover:text-blue-700" />
                    <x-button.btn-dropdown-item href="{{ route('warehouse_processings.index', $warehouseStorage->id) }}" value="Saída de Produtos" icon="fas fa-arrow-alt-circle-left" class="text-red-500 hover:text-red-700"/>
                </x-button.btn-dropdown>
            </div>
        </x-header.header-group>

        <div>
            <livewire:warehouse.warehouse-inventory.warehouse-inventory-item-table :dbWarehouseStorageId="$warehouseStorage->id" />
        </div>
    @endslot
</x-pages.app>
