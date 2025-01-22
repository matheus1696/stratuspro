<x-pages.app>

    @slot('body')    
    
        <x-header.header-group>
            <x-header.header-title title="Cadastro de Estabelecimento" /> 
            <div>
                <x-button.link-secondary href="{{ route('establishments.index') }}" value="Voltar" />
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
