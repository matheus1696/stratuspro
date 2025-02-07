<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Alterar Almoxarifado" />
            <div class="flex gap-2">
                <x-button.link-secondary href="{{ route('warehouse_storages.show', $dbWarehouseStorage) }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.conteiner>
                <form action="{{ route('warehouse_storages.update', $dbWarehouseStorage) }}" method="post">
                    @csrf @method('PUT')
                    <livewire:warehouse.warehouse-storage.warehouse-storage-form :warehouseStorageId="$dbWarehouseStorage" />
                    <x-button.btn-secondary value="Alterar Almoxarifado" />
                </form>
            </x-pages.conteiner>
        </div>
    @endslot

</x-pages.app>
