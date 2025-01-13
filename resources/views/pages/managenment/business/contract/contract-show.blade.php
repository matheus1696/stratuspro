<x-pages.app>

    @slot('body')
    
        <x-header.header-group>
            <x-header.header-title title="Gestão de Contratos - Detalhes do Contrato" />
            <div>
                <a href="{{ route('contracts.index') }}" class="text-sm bg-gray-600 hover:bg-gray-700 rounded-full shadown-lg px-2.5 py-1.5 text-white hover:text-white transition-all duration-100">Lista de Contratos</a>
            </div>
        </x-header.header-group>  

        <div>
            <livewire:managenment.business.contract.contract-show :contractId="$dbContract" />
        </div>

        <div>
            <h3 class="mt-5 pl-2 font-semibold text-lg">Lista de Itens</h3>
            <livewire:managenment.business.contract.contract-item-table :contractId="$dbContract" />
        </div>

    @endslot

</x-pages.app>