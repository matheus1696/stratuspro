<div>
    <x-table.table :paginate="$dbWarehouseProducts">
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
            <x-table.th class="w-28">Código</x-table.th>
            <x-table.th class="w-60">Item</x-table.th>
            <x-table.th class="w-32">Categoria</x-table.th>
            <x-table.th class="w-20">Status</x-table.th>
            <x-table.th class="w-16"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbWarehouseProducts as $dbWarehouseProduct)
                <x-table.tr>
                    <x-table.td>{{$dbWarehouseProduct->barcode}}</x-table.td>
                    <x-table.td>{{$dbWarehouseProduct->title}}</x-table.td>
                    <x-table.td>{{$dbWarehouseProduct->ProductCategory->title}}</x-table.td>
                    <x-table.td>
                        <x-button.btn-status condition="{{ $dbWarehouseProduct->is_active }}" route="{{ route('warehouse_products.is_active', $dbWarehouseProduct->id)}}" />
                    </x-table.td>                    
                    <x-table.td>
                        <x-table.button.btn-group>
                            <x-table.button.btn-edit href="{{ route('warehouse_products.edit', $dbWarehouseProduct->id)}}" />
                        </x-table.button.btn-group>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>