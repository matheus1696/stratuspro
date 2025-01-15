<x-pages.app>

    @slot('body')

        <x-header.header-group>
            <x-header.header-title title="Cadastrar Novo Item" /> 
            <div>
                <a href="{{ route('contracts.show', $dbContract) }}" class="text-sm bg-gray-600 hover:bg-gray-700 rounded-full shadown-lg px-2.5 py-1.5 text-white hover:text-white transition-all duration-100">Voltar</a>
            </div>
        </x-header.header-group>  
    
        <div>
            <form action="{{ route('contract_items.store', $dbContract) }}" method="post" class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                @csrf
                                
                <livewire:managenment.business.contract.contract-item-form :contractId="$dbContract" />
        
                <x-button.btn-primary value="Cadastrar Novo Item" />
        
            </form>
        </div>

    @endslot

</x-pages.app>