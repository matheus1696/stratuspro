<x-pages.app>

    @slot('body')    
    
        <div class="flex justify-between items-center h-20">
            <x-title.page-title title="Gestão de Contratos" /> 
            <div>
                <a href="{{ route('contracts.index') }}" class="text-sm bg-gray-600 hover:bg-gray-700 rounded-full shadown-lg px-2.5 py-1.5 text-white hover:text-white transition-all duration-100">Voltar</a>
            </div>
        </div>   
    
        <div>
            <livewire:managenment.business.contract.contract-form :contractId="{{$dbContract->id}}"/>
        </div>

    @endslot

</x-pages.app>