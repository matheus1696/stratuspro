<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Lista de Itens" />
            <div>
                <x-button.link-primary href="{{ route('warehouse_products.create') }}" value="Novo Produto" />
            </div>
        </x-header.header-group>
    
        <div>
            <livewire:warehouse.warehouse-product.warehouse-product-table />
        </div>

    @endslot

</x-pages.app>