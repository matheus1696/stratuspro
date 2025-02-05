<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Entrada de Produto" />
            <div>
                <x-button.link-secondary href="{{ route('warehouse_inventories.index') }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.conteiner>
                <form action="{{ route('warehouse_inventories.entryStore', $warehouseStorage->id) }}" method="post">
                    @csrf
                    <livewire:warehouse.warehouse-moviment.warehouse-moviment-form />
                    <x-button.btn-primary value="Cadastrar Produto" />
                </form>
            </x-pages.conteiner>

            <div class="pb-10">
                <x-header.header-group class="pb-1">
                    <x-header.header-subtitle title="Últimas Entradas"/>
                </x-header.header-group>
                
                <livewire:warehouse.warehouse-moviment.warehouse-moviment-table :dbWarehouseStorageId="$warehouseStorage->id" />
            </div>

        </div>
    @endslot

</x-pages.app>
