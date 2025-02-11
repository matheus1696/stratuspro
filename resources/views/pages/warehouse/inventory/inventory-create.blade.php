<x-pages.app>
    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Entrada de Produto" />
            <div class="flex gap-2">
                <x-button.link-secondary href="{{ route('warehouse_inventories.show', $warehouseStorage->id) }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.container>
                <form action="{{ route('warehouse_inventories.entryStore', $warehouseStorage->id) }}" method="post">
                    @csrf
                    <livewire:warehouse.warehouse-moviment.warehouse-moviment-form />
                    <x-button.btn-primary value="Cadastrar Produto" />
                </form>
            </x-pages.container>

            <div class="pb-10">
                <x-header.header-group class="pb-1">
                    <x-header.header-subtitle title="Últimas Entradas"/>
                </x-header.header-group>

                <livewire:warehouse.warehouse-moviment.warehouse-moviment-table :dbWarehouseStorageId="$warehouseStorage->id" />
            </div>
        </div>
    @endslot
</x-pages.app>
