<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Alterar Almoxarifado" />
            <div>
                <x-button.link-secondary href="{{ route('warehouses.show', $dbWarehouse) }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.conteiner>
                <form action="{{ route('warehouses.update', $dbWarehouse) }}" method="post">
                    @csrf @method('PUT')
                    <livewire:configuration.warehouse.warehouse-list-form :warehouseId="$dbWarehouse" />
                    <x-button.btn-secondary value="Alterar Almoxarifado" />
                </form>
            </x-pages.conteiner>
        </div>
    @endslot

</x-pages.app>
