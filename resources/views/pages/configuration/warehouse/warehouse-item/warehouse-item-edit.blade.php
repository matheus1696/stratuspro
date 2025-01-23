<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Alterar Item" />
            <div>
                <x-button.link-secondary href="{{ route('warehouse_items.index') }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.conteiner>
                <form action="{{ route('warehouse_items.update', $dbWarehouseItem) }}" method="post">
                    @csrf @method('PUT')
                    <livewire:configuration.warehouse.warehouse-item-form :warehouseId="$dbWarehouseItem" />
                    <x-button.btn-secondary value="Alterar Item" />
                </form>
            </x-pages.conteiner>
        </div>
    @endslot

</x-pages.app>
