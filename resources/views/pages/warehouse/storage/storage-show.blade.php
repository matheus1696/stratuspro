<x-pages.app>

    @slot('body')

        <x-header.header-group>
            <x-header.header-title title="Detalhes do Almoxarifado" />
            <div class="flex gap-2">
                <x-button.link-secondary href="{{ route('warehouse_storages.index') }}" value="Voltar à Lista" />
            </div>
        </x-header.header-group>  

        <div>            
            <livewire:warehouse.warehouse-storage.warehouse-storage-show :warehouseStorageId="$dbWarehouseStorage" />
        </div>

    @endslot

</x-pages.app>
