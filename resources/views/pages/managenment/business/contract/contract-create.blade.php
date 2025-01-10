<x-pages.app>

    @slot('body')    
    
        <div class="flex justify-between items-center h-20">
            <x-title.page-title title="Gestão de Contratos" /> 
            <div>
                <a href="{{ route('contracts.index') }}" class="text-xs bg-gray-600 hover:bg-gray-700 rounded-full shadown-lg px-2 py-1 text-white hover:text-white transition-all duration-100">Voltar</a>
            </div>
        </div>   
    
        <div>
            <livewire:managenment.business.contract.contract-form />
        </div>

    @endslot

</x-pages.app>