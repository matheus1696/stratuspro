<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Lista de Estoques Locais" />
            <div>
                <x-button.link-primary href="{{ route('stock_controls.create') }}" value="Novo Centro" />
            </div>
        </x-header.header-group>
    
        <div>
            <livewire:warehouse.stock_control.stock_control-table />
        </div>

    @endslot

</x-pages.app>