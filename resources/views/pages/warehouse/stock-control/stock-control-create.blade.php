<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Cadastrar Estoque Local" />
            <div>
                <x-button.link-secondary href="{{ route('stock_controls.index') }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.conteiner>
                <form action="{{ route('stock_controls.store') }}" method="post">
                    @csrf
                    <livewire:warehouse.stock_control.stock_control-form />
                    <x-button.btn-primary value="Cadastrar Novo Estoque" />
                </form>
            </x-pages.conteiner>
        </div>
    @endslot

</x-pages.app>
