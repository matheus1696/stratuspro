<x-pages.app>
    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Alterar Produto" />
            
            <div class="flex gap-2">
                <x-button.link-secondary href="{{ route('warehouse_products.index') }}" value="Voltar para a Lista" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.container>
                <form action="{{ route('warehouse_products.update', $dbWarehouseProduct) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <livewire:warehouse.warehouse-product.warehouse-product-form :warehouseProductId="$dbWarehouseProduct" />
                    
                    <x-button.btn-secondary value="Alterar Produto" />
                </form>
            </x-pages.container>
        </div>
    @endslot
</x-pages.app>
