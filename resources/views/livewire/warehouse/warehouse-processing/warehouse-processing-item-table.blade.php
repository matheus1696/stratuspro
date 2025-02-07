<div>
    <x-table.table>
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-96">Produto</x-table.th>
            <x-table.th class="w-24">Quantidade</x-table.th>
            <x-table.th class="w-10"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbWarehouseProcessingItems as $dbWarehouseProcessingItem)
                <x-table.tr>
                    <x-table.td>{{ $dbWarehouseProcessingItem->WarehouseProduct->title }}</x-table.td>
                    <x-table.td>{{ $dbWarehouseProcessingItem->quantity }}</x-table.td>
                    <x-table.td>                        
                        <x-table.button.btn-group>
                            <x-table.button.btn-destroy href="{{ route('warehouse_processing_items.itemDestroy', $dbWarehouseProcessingItem->id) }}" />
                        </x-table.button.btn-group>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
