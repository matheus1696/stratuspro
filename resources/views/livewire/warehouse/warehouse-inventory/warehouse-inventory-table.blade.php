<div>
    <x-table.table>
        @slot('search')
            <x-pages.container>
                <div class="grid grid-cols-12 gap-3">
                    <!-- Filtro de Almoxarifado -->
                    <div class="col-span-12 md:col-span-9">
                        <x-form.form-label for="searchWarehouse" value="Nome do Almoxarifado" />
                        <x-form.form-input id="searchWarehouse" type="text" wire:model.live.debounce.300ms="searchWarehouse"
                            placeholder="Digite o nome do almoxarifado" />
                    </div>

                    <!-- Filtro de Unidade -->
                    <div class="col-span-12 md:col-span-3">
                        <x-form.form-label for="searchEstablishment" value="Nome da Unidade" />
                        <x-form.form-select id="searchEstablishment" defaultOption="Todas as unidades"
                            wire:model.live.debounce.300ms="searchEstablishment">
                            @foreach ($dbEstablishments as $dbEstablishment)
                                <option value="{{ $dbEstablishment->id }}">
                                    {{ $dbEstablishment->title }}
                                </option>
                            @endforeach
                        </x-form.form-select>
                    </div>
                </div>
            </x-pages.container>
        @endslot


        <!-- Cabeçalho da Tabela -->
        @slot('thead')
            <x-table.th class="w-24">Código</x-table.th>
            <x-table.th class="w-80">Almoxarifado</x-table.th>
            <x-table.th class="w-40">Estabelecimento</x-table.th>
            <x-table.th class="w-16"></x-table.th>
        @endslot

        <!-- Corpo da Tabela -->
        @slot('tbody')
            @foreach ($dbWarehouseStorages as $dbWarehouseStorage)
                <x-table.tr>
                    <x-table.td>{{ $dbWarehouseStorage->code }}</x-table.td>
                    <x-table.td>{{ $dbWarehouseStorage->title }}</x-table.td>
                    <x-table.td>{{ $dbWarehouseStorage->CompanyEstablishment->title }}</x-table.td>
                    <x-table.td>
                        <x-table.button.btn-group>
                            <x-table.button.btn-show
                                href="{{ route('warehouse_inventories.show', $dbWarehouseStorage->id) }}" />
                        </x-table.button.btn-group>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot
    </x-table.table>

    <!-- Select de Quantidade por Página -->
    <div class="flex justify-end mt-2">
        <div class="w-44 md:w-32">
            <x-form.form-select wire:model.live="perPage">
                <option value="10" selected>10 por página</option>
                <option value="20">20 por página</option>
                <option value="30">30 por página</option>
                <option value="40">40 por página</option>
                <option value="50">50 por página</option>
            </x-form.form-select>
        </div>
    </div>
</div>
