<x-pages.app>
    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Cadastrar Produto" />
            
            <div class="flex gap-2">
                <x-button.link-secondary href="{{ route('warehouse_products.index') }}" value="Voltar para a Lista" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.container>
                <x-form.form-group action="{{ route('warehouse_products.store') }}" method="POST">
                    @csrf
                    <livewire:warehouse.warehouse-product.warehouse-product-form />
                    
                    <x-button.btn-primary value="Cadastrar Produto" />
                </x-form.form-group>
            </x-pages.container>
        </div>
    @endslot
</x-pages.app>