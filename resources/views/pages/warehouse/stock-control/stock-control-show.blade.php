<x-pages.app>

    @slot('body')
    
        <x-header.header-group>
            <x-header.header-title title="Estoque Local" />
            <div>
                <a href="{{ route('stock_controls.index') }}" class="text-sm bg-gray-600 hover:bg-gray-700 rounded-full shadown-lg px-2.5 py-1.5 text-white hover:text-white transition-all duration-100">Voltar</a>
            </div>
        </x-header.header-group>  

        <div>            
            <livewire:warehouse.stock-control.stock-control-show :stockControlId="$dbStockControl"/>
        </div>

    @endslot

</x-pages.app>