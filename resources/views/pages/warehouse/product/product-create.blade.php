<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Cadastrar Produto" />
            <div class="flex gap-2">
                <x-button.link-secondary href="{{ route('warehouse_products.index') }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.conteiner>
                <form action="{{ route('warehouse_products.store') }}" method="post">
                    @csrf
                    <livewire:warehouse.warehouse-product.warehouse-product-form />
                    <x-button.btn-primary value="Cadastrar Produto" />
                </form>
            </x-pages.conteiner>
        </div>
    @endslot

</x-pages.app>
