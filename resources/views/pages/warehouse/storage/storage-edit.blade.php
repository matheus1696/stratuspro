<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Editar Almoxarifado" />
            <div class="flex gap-2">
                <x-button.link-secondary href="{{ route('warehouse_storages.show', $dbWarehouseStorage) }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.container>
                <form action="{{ route('warehouse_storages.update', $dbWarehouseStorage) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <livewire:warehouse.warehouse-storage.warehouse-storage-form :warehouseStorageId="$dbWarehouseStorage" />
                    <x-button.btn-secondary value="Salvar Alterações" />
                </form>
            </x-pages.container>
        </div>
    @endslot

</x-pages.app>
