<x-pages.app>

    @slot('body')
    
        <x-header.header-group>
            <x-header.header-title title="Estabelecimento" />
            <div>
                <a href="{{ route('establishments.index') }}" class="text-sm bg-gray-600 hover:bg-gray-700 rounded-full shadown-lg px-2.5 py-1.5 text-white hover:text-white transition-all duration-100">Lista de Estabelecimento</a>
            </div>
        </x-header.header-group>  

        <div>
            <livewire:configuration.company.establishment.establishment-show :establishmentId="$dbEstablishment" />
        </div>

    @endslot

</x-pages.app>