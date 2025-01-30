<div>    
    <x-table.table>
        @slot('search')
            <div class="flex justify-end gap-2">
                <div class="flex justify-end gap-2">
                    <div class="w-full md:w-80">
                        <!-- Filtros de Pesquisa -->
                        <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Nome do produto" />
                    </div>
                </div>
            </div>
        @endslot
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-28">Código</x-table.th>
            <x-table.th class="w-80">Produto</x-table.th>
            <x-table.th class="w-20">Quantidade</x-table.th>
            <x-table.th class="w-14"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbWarehouseInventories as $dbWarehouseInventory)
                <x-table.tr>
                    <x-table.td>{{$dbWarehouseInventory->WarehouseProduct->barcode}}</x-table.td>
                    <x-table.td>{{$dbWarehouseInventory->WarehouseProduct->title}}</x-table.td>      
                    <x-table.td>{{$dbWarehouseInventory->quantity}}</x-table.td>              
                    <x-table.td>
                        <x-table.button.btn-group>
                            <x-table.button.btn-show href="{{ route('warehouse_inventories.show', $dbWarehouseInventory->id)}}" />
                        </x-table.button.btn-group>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
