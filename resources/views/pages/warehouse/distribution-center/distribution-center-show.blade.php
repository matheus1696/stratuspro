<x-pages.app>

    @slot('body')
    
        <x-header.header-group>
            <x-header.header-title title="Centros de Distribuição" />
            <div>
                <a href="{{ route('distribution_centers.index') }}" class="text-sm bg-gray-600 hover:bg-gray-700 rounded-full shadown-lg px-2.5 py-1.5 text-white hover:text-white transition-all duration-100">Voltar</a>
            </div>
        </x-header.header-group>  

        <div>
            <livewire:warehouse.distribution-center.distribution-center-show :distributionCenterId="$dbDistributionCenter"/>
        </div>

    @endslot

</x-pages.app>