<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Lista de Itens" />
            <div>
                <x-button.link-primary href="{{ route('warehouse_items.create') }}" value="Novo Item" />
            </div>
        </x-header.header-group>
    
        <div>
            <livewire:configuration.warehouse.warehouse-item-table />
        </div>

    @endslot

</x-pages.app>