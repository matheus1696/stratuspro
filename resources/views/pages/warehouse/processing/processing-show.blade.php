<x-pages.app>
    @slot('body')
    
        <!-- Cabeçalho com título e botões de navegação -->
        <x-header.header-group>
            <x-header.header-title title="Solicitação Nº {{ $warehouseProcessing->ticket }}" />
            <div class="flex gap-2">
                <!-- Condicional para exibir botão de separação -->
                @if ($warehouseProcessing->processing_category_id === 1)
                    <x-button.link-primary 
                        href="{{ route('warehouse_processings.separation', $warehouseProcessing->id) }}" 
                        value="Separação" 
                    />
                @endif
                <!-- Botão para voltar -->
                <x-button.link-secondary 
                    href="{{ route('warehouse_processings.index', $warehouseProcessing->warehouse_id) }}" 
                    value="Voltar" 
                />
            </div>
        </x-header.header-group>

        <!-- Detalhes do pedido -->
        <x-pages.container class="text-sm pt-2 mb-5">
            <div>
                <p class="text-sm font-semibold pb-3 text-gray-400">Detalhe do pedido</p>
            </div> 
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                <div><strong>Solicitação Nº:</strong> {{$warehouseProcessing->ticket}}</div>
                <div><strong>Data de Criação:</strong> {{ date('d/m/Y H:i', strtotime($warehouseProcessing->created_at)) }}</div>
                <div class="lg:col-span-1"><strong>Unidade:</strong> {{$warehouseProcessing->CompanyEstablishment->title}}</div>
                <div class="lg:col-span-1"><strong>Processamento:</strong> {{$warehouseProcessing->WarehouseProcessingCategory->title}}</div>
            </div>
        </x-pages.container>

        <!-- Adicionar Produto - Condicional para a categoria de processamento -->
        @if ($warehouseProcessing->processing_category_id === 1)
            <x-pages.container class="pt-2">
                <div>
                    <p class="text-sm font-semibold pb-3 text-gray-400">Adicionar Produto</p>
                </div>
                <div>
                    <form action="{{ route('warehouse_processing_items.store', $warehouseProcessing->id) }}" method="post">
                        @csrf                    
                        <!-- Formulário Livewire para adicionar produto -->
                        <livewire:warehouse.warehouse-processing.warehouse-processing-item-form :dbWarehouseProcessingId="$warehouseProcessing->id"/>
                        <x-button.btn-primary value="Adicionar Produto" />
                    </form>
                </div>
            </x-pages.container>
        @endif

        <!-- Tabela de Itens do Processamento -->
        <div class="pt-3">
            <livewire:warehouse.warehouse-processing.warehouse-processing-item-table :dbWarehouseProcessingId="$warehouseProcessing->id"/>
        </div>

    @endslot
</x-pages.app>
