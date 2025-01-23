<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Cadastrar Item" />
            <div>
                <x-button.link-secondary href="{{ route('warehouse_items.index') }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.conteiner>
                <form action="{{ route('warehouse_items.store') }}" method="post">
                    @csrf
                    <livewire:configuration.warehouse.warehouse-item-form />
                    <x-button.btn-primary value="Cadastrar Item" />
                </form>
            </x-pages.conteiner>
        </div>
    @endslot

</x-pages.app>
