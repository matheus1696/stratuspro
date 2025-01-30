<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Entrada de Produto" />
            <div>
                <x-button.link-secondary href="{{ route('warehouse_products.index') }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.conteiner>
                <form action="{{ route('warehouse_products.store') }}" method="post">
                    @csrf
                    <livewire:warehouse.warehouse-inventory.warehouse-inventory-item-form />
                    <x-button.btn-primary value="Cadastrar Produto" />
                </form>
            </x-pages.conteiner>
        </div>
    @endslot

</x-pages.app>
