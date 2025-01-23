<div>
    <x-table.table :paginate="$dbWarehouseItems">
        @slot('search')
            <div class="flex justify-between gap-2">
                    
                <div class="w-44 md:w-32">
                    <x-form.form-select wire:model.live="perPage">
                        <option value="10" selected>10 por página</option>
                        <option value="20">20 por página</option>
                        <option value="30">30 por página</option>
                        <option value="40">40 por página</option>
                        <option value="50">50 por página</option>
                    </x-form.form-select>
                </div>

                <div class="w-full md:w-80">
                    <!-- Filtros de Pesquisa -->
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Nome do item" />
                </div>
            </div>
        @endslot
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th>Item</x-table.th>
            <x-table.th class="w-28">Status</x-table.th>
            <x-table.th class="w-16"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbWarehouseItems as $dbWarehouseItem)
                <x-table.tr>
                    <x-table.td>{{$dbWarehouseItem->title}}</x-table.td>
                    <x-table.td>
                        <x-button.btn-status condition="{{ $dbWarehouseItem->is_active }}" route="{{ route('warehouse_items.is_active', $dbWarehouseItem->id)}}" />
                    </x-table.td>                    
                    <x-table.td>
                        <x-table.button.btn-group>
                            <x-table.button.btn-edit href="{{ route('warehouse_items.edit', $dbWarehouseItem->id)}}" />
                        </x-table.button.btn-group>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>