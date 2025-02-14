<x-pages.app>

    @slot('body')
        <!-- Cabeçalho com título e botão de navegação -->
        <x-header.header-group>
            <x-header.header-title title="Abertura de Solicitação" />
            <div class="flex gap-2">
                <!-- Botão para voltar à tela anterior -->
                <x-button.link-secondary 
                    href="{{ route('warehouse_processings.index', $warehouseStorage->id) }}" 
                    value="Voltar" 
                />
            </div>
        </x-header.header-group>

        <!-- Formulário para abrir solicitação -->
        <div>
            <x-pages.container open="true" title="Abertura de Solicitação" icon="fas fa-file-contract">
                <!-- Formulário para abrir solicitação de processamento -->
                <form action="{{ route('warehouse_processings.store', $warehouseStorage->id) }}" method="post">
                    @csrf
                    <!-- Componente Livewire para formulário de solicitação -->
                    <livewire:warehouse.warehouse-processing.warehouse-processing-form />
                    <x-button.btn-primary value="Abrir Solicitação" />
                </form>
            </x-pages.container>
        </div>
        
    @endslot

</x-pages.app>
