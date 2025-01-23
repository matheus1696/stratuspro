<x-pages.app>

    @slot('body')
    
        <x-header.header-group>
            <x-header.header-title title="Lista de Almoxarifado" />
            <div>
                <x-button.link-secondary href="{{ route('warehouses.index') }}" value="Voltar" />
            </div>
        </x-header.header-group>  

        <div>            
            <livewire:configuration.warehouse.warehouse-list-show :warehouseId="$dbWarehouse"/>
        </div>

    @endslot

</x-pages.app>