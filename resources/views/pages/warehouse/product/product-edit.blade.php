<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Alterar Produto" />
            <div>
                <x-button.link-secondary href="{{ route('warehouse_products.index') }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.conteiner>
                <form action="{{ route('warehouse_products.update', $dbWarehouseProduct) }}" method="post">
                    @csrf @method('PUT')
                    <livewire:warehouse.warehouse-product.warehouse-product-form  :warehouseProductId="$dbWarehouseProduct" />
                    <x-button.btn-secondary value="Alterar Produto" />
                </form>
            </x-pages.conteiner>
        </div>
    @endslot

</x-pages.app>
