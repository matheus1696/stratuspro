<div>
    <x-table.table>
        @slot('search')
            <x-pages.container>
                <div class="grid grid-cols-12 gap-3">
                    <!-- Filtro de Produto -->
                    <div class="col-span-12 md:col-span-9">
                        <x-form.form-label for="searchProduct" value="Produto" />
                        <x-form.form-input type="text" wire:model.live.debounce.300ms="searchProduct" placeholder="Nome do produto" />
                    </div>

                    <!-- Filtro de Categoria do Produto -->
                    <div class="col-span-12 md:col-span-3">
                        <x-form.form-label for="searchProductCategory" value="Tipo do Produto" />
                        <x-form.form-select id="searchProductCategory" defaultOption="Todos" wire:model.live.debounce.300ms="searchProductCategory">
                            @foreach ($dbProductCategories as $dbProductCategory)
                                <option value="{{ $dbProductCategory->id }}">
                                    {{ $dbProductCategory->title }}
                                </option>
                            @endforeach
                        </x-form.form-select>
                    </div>
                </div>
            </x-pages.container>
        @endslot

        <!-- Cabeçalho da Tabela -->
        @slot('thead')
            <x-table.th class="w-80">Produto</x-table.th>
            <x-table.th class="w-24">Tipo</x-table.th>
            <x-table.th class="w-16">Estoque Atual</x-table.th>
        @endslot

        <!-- Corpo da Tabela -->
        @slot('tbody')
            @foreach ($dbWarehouseInventories as $dbWarehouseInventory)
                <x-table.tr>
                    <x-table.td>{{ $dbWarehouseInventory->WarehouseProduct->title }}</x-table.td>
                    <x-table.td>{{ $dbWarehouseInventory->WarehouseProduct->WarehouseProductCategory->title }}</x-table.td>
                    <x-table.td>{{ $dbWarehouseInventory->quantity }}</x-table.td>
                </x-table.tr>
            @endforeach
        @endslot
    </x-table.table>
</div>
