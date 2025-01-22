<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Alterar Estoque Local" />
            <div>
                <x-button.link-secondary href="{{ route('stock_controls.index') }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.conteiner>
                <form action="{{ route('stock_controls.update', $dbStockControl) }}" method="post">
                    @csrf @method('PUT')
                    <livewire:warehouse.stock-control.stock-control-form :stockControlId="$dbStockControl"/>
                    <x-button.btn-secondary value="Alterar" />
                </form>
            </x-pages.conteiner>
        </div>
    @endslot

</x-pages.app>
