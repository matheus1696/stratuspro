<x-pages.app>

    @slot('body')    
    
        <x-header.header-group>
            <x-header.header-title title="Estabelecimento - Alteração de dados" /> 
            <div>
                <a href="{{ route('establishments.show', $dbEstablishment) }}" class="text-sm bg-gray-600 hover:bg-gray-700 rounded-full shadown-lg px-2.5 py-1.5 text-white hover:text-white transition-all duration-100">Voltar</a>
            </div>
        </x-header.header-group>  
    
        <div>
            <form action="{{ route('establishments.update', $dbEstablishment) }}" method="post" class="bg-white p-6 rounded-lg shadow-lg">
                @csrf @method('PUT')
                
                
                <livewire:configuration.company.establishment.establishment-form :establishmentId="$dbEstablishment"/>
                
                <x-button.btn-secondary value="Salvar Alterações" />
        
            </form>
        </div>

    @endslot

</x-pages.app>