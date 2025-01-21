<x-pages.app>

    @slot('body')    
    
        <x-header.header-group>
            <x-header.header-title title="Cadastro de Estabelecimento" /> 
            <div>
                <a href="{{ route('establishments.index') }}" class="text-sm bg-gray-600 hover:bg-gray-700 rounded-full shadown-lg px-2.5 py-1.5 text-white hover:text-white transition-all duration-100">Voltar</a>
            </div>
        </x-header.header-group>  
    
        <div>
            <form action="{{ route('establishments.store') }}" method="post" class="bg-white p-6 rounded-lg shadow-lg">
                @csrf

                <livewire:configuration.company.establishment.establishment-form/>
                
                <x-button.btn-primary value="Cadastrar Novo Estabelecimento" />
        
            </form>
        </div>

    @endslot

</x-pages.app>
