<div>    
    <x-table.table>
        @slot('search')
            <x-pages.conteiner class="px-3 py-3">
                <p class="font-bold uppercase text-sm pl-1 text-gray-400"> <i class="fas fa-filter text-xs"></i> Filtros:</p>
                <div class="grid grid-cols-12 gap-3">

                    <!-- Filtros de Pesquisa -->
                    <div class="col-span-12 md:col-span-9">
                        <x-form.form-label for="date" value="Produto" />
                        <x-form.form-input type="text" wire:model.live.debounce.300ms="searchProduct" placeholder="Nome do produto" />
                    </div>

                    <!-- Filtros de Pesquisa -->
                    <div class="col-span-12 md:col-span-3">
                        <x-form.form-label for="searchProductCategory" value="Unidade" />
                        <x-form.form-select id="searchProductCategory" defaultOption="Todos" wire:model.live.debounce.300ms="searchProductCategory">
                            @foreach ($dbProductCategories as $dbProductCategory)
                                <option value="{{ $dbProductCategory->id }}">
                                    {{ $dbProductCategory->title }}
                                </option>
                            @endforeach
                        </x-form.form-select>
                    </div>
                </div>
            </x-pages.conteiner>
        @endslot
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-80">Produto</x-table.th>
            <x-table.th class="w-24">Tipo</x-table.th>
            <x-table.th class="w-16">Estoque Atual</x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbWarehouseInventories as $dbWarehouseInventory)
                <x-table.tr>
                    <x-table.td>{{$dbWarehouseInventory->WarehouseProduct->title}}</x-table.td> 
                    <x-table.td>{{$dbWarehouseInventory->WarehouseProduct->WarehouseProductCategory->title}}</x-table.td>      
                    <x-table.td>{{$dbWarehouseInventory->quantity}}</x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
