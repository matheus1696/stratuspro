<x-pages.app>

    @slot('body')
    
        <x-header.header-group>
            <x-header.header-title title="Gestão de Contratos - Lista de Contratos" />
            <div>
                <a href="{{ route('contracts.create') }}" class="text-sm bg-green-600 hover:bg-green-700 rounded-full shadown-lg px-2.5 py-1.5 text-white hover:text-white transition-all duration-100">Novo Contrato</a>
            </div>
        </x-header.header-group>

        <div>
            <livewire:managenment.business.contract.contract-table />
        </div>

    @endslot

</x-pages.app>