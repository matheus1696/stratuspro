<x-pages.app>

    @slot('body')

        <x-header.header-group>
            <x-header.header-title title="Gestão de Contratos - Novo Contrato" /> 
            <div>
                <a href="{{ route('contracts.index') }}" class="text-sm bg-gray-600 hover:bg-gray-700 rounded-full shadown-lg px-2.5 py-1.5 text-white hover:text-white transition-all duration-100">Lista de Contratos</a>
            </div>
        </x-header.header-group>  
    
        <div>
            <form action="{{ route('contracts.store') }}" method="post" class="bg-white p-6 rounded-lg shadow-lg">
                @csrf
                                
                <livewire:managenment.business.contract.contract-form />
        
                <x-button.btn-primary value="Cadastrar Novo Contrato" />
        
            </form>
        </div>

    @endslot

</x-pages.app>