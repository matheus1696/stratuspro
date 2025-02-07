<x-pages.app>

    @slot('body')
    
        <x-header.header-group>
            <x-header.header-title title="Lista de Almoxarifado" />
            <div class="flex gap-2">
                <x-button.link-secondary href="{{ route('warehouse_storages.index') }}" value="Voltar" />
            </div>
        </x-header.header-group>  

        <div>            
            <livewire:warehouse.warehouse-storage.warehouse-storage-show :warehouseStorageId="$dbWarehouseStorage"/>
        </div>

    @endslot

</x-pages.app>