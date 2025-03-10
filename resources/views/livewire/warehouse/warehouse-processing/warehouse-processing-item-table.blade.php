<div>
    <x-table.table>
        <!-- Início do Slot de Cabeçalho da Tabela -->
        @slot('thead')
            <x-table.th class="w-96">Produto</x-table.th>
            <x-table.th class="w-24">Estoque Atual</x-table.th>
            <x-table.th class="w-24">Quantidade</x-table.th>
            @if ($dbWarehouseProcessing->processing_category_id === 1)
                <x-table.th class="w-10"></x-table.th>
            @endif
        @endslot

        <!-- Início do Slot de Corpo da Tabela -->
        @slot('tbody')
            @foreach ($dbWarehouseProcessingItems as $dbWarehouseProcessingItem)
                <x-table.tr>
                    <!-- Exibe o nome do produto -->
                    <x-table.td>{{ $dbWarehouseProcessingItem->WarehouseProduct->title }}</x-table.td>

                    <!-- Exibe a quantidade em estoque do produto -->
                    @foreach ($dbWarehouseInventories as $dbWarehouseInventory)
                        @if ($dbWarehouseInventory->product_id == $dbWarehouseProcessingItem->product_id)
                            <x-table.td>{{ $dbWarehouseInventory->quantity }}</x-table.td>
                        @endif
                    @endforeach

                    <!-- Exibe a quantidade do item no processamento -->
                    <x-table.td>{{ $dbWarehouseProcessingItem->quantity }}</x-table.td>

                    <!-- Botão de ação se a categoria de processamento for igual a 1 -->
                    @if ($dbWarehouseProcessing->processing_category_id === 1)
                        <x-table.td>
                            <x-table.button.btn-group>
                                <x-table.button.btn-destroy href="{{ route('warehouse_processing_items.itemDestroy', $dbWarehouseProcessingItem->id) }}" />
                            </x-table.button.btn-group>
                        </x-table.td>
                    @endif
                </x-table.tr>
            @endforeach
        @endslot
    </x-table.table>
</div>
