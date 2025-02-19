<x-pages.app>
    @slot('body')
    
        <!-- Cabeçalho com título e botões de navegação -->
        <x-header.header-group>
            <x-header.header-title title="Solicitação Nº {{ $warehouseProcessing->ticket }}" />
            <div class="flex gap-2">
                <!-- Condicional para exibir botão de separação -->
                @if ($warehouseProcessing->processing_category_id === 1)
                    <x-button.link-primary href="{{ route('warehouse_processings.separation', $warehouseProcessing->id) }}" value="Separação" />
                @endif
                @if ($warehouseProcessing->processing_category_id === 2)
                    <x-button.link-tertiary href="{{ route('warehouse_processings.separationReport', $warehouseProcessing->id) }}" value="Impressão" class="bg-green-500 hover:bg-green-600 text-white hover:text-white" target="_blank"/>
                @endif
                <!-- Botão para voltar -->
                <x-button.link-secondary href="{{ route('warehouse_processings.index', $warehouseProcessing->warehouse_id) }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <!-- Detalhes do pedido -->
        <div class="pb-4">
            <x-pages.container open="true" title="Detalhe da Solicitação" icon="fas fa-file-contract">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 text-sm">
                    <div><strong>Solicitação Nº:</strong> {{$warehouseProcessing->ticket}}</div>
                    <div><strong>Data de Criação:</strong> {{ date('d/m/Y H:i', strtotime($warehouseProcessing->created_at)) }}</div>
                    <div class="lg:col-span-1"><strong>Unidade:</strong> {{$warehouseProcessing->CompanyEstablishment->title}}</div>
                    <div class="lg:col-span-1"><strong>Processamento:</strong> {{$warehouseProcessing->WarehouseProcessingCategory->title}}</div>
                </div>
            </x-pages.container>
        </div>

        @if ($warehouseProcessing->processing_category_id === 1)
            <x-pages.container open="true" title="Adicionar Produto" icon="fas fa-apple-alt">
                <div>
                    <form action="{{ route('warehouse_processing_items.store', $warehouseProcessing->id) }}" method="post">
                        @csrf                    
                        
                        <livewire:warehouse.warehouse-processing.warehouse-processing-item-form :dbWarehouseProcessingId="$warehouseProcessing->id"/>
                        <x-button.btn-primary value="Abrir Solicitação" />
                    </form>
                </div>
            </x-pages.container>
        @endif

        <div class="pt-3">
            <livewire:warehouse.warehouse-processing.warehouse-processing-item-table :dbWarehouseProcessingId="$warehouseProcessing->id"/>
        </div>

    @endslot
</x-pages.app>
