<div>
    <x-table.table :paginate="$dbWarehouseStorages">
        @slot('search')
            <div class="flex justify-between gap-2">
                <!-- Seleção de itens por página -->
                <div class="w-44 md:w-32">
                    <x-form.form-select wire:model.live="perPage">
                        @foreach ([10, 20, 30, 40, 50] as $perPage)
                            <option value="{{ $perPage }}">{{ $perPage }} por página</option>
                        @endforeach
                    </x-form.form-select>
                </div>

                <div class="flex justify-end gap-2">
                    <!-- Filtro por tipo de almoxarifado -->
                    <div class="w-44">
                        <x-form.form-select wire:model.live="typeId">
                            <option value="" selected>Todos os tipos</option>
                            @foreach ($dbWarehouseStorageTypes as $dbWarehouseStorageType)
                                <option value="{{ $dbWarehouseStorageType->id }}">{{ $dbWarehouseStorageType->title }}</option>
                            @endforeach
                        </x-form.form-select>
                    </div>

                    <!-- Campo de pesquisa -->
                    <div class="w-full md:w-80">
                        <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Buscar por nome do almoxarifado" />
                    </div>
                </div>
            </div>
        @endslot

        @slot('thead')
            <x-table.th class="w-32">Código</x-table.th>
            <x-table.th class="w-80">Nome</x-table.th>
            <x-table.th class="w-32">Tipo</x-table.th>
            <x-table.th class="w-60">Estabelecimento</x-table.th>
            <x-table.th class="w-28">Status</x-table.th>
            <x-table.th class="w-16">Ações</x-table.th>
        @endslot

        @slot('tbody')
            @foreach ($dbWarehouseStorages as $dbWarehouseStorage)
                <x-table.tr>
                    <x-table.td>{{ $dbWarehouseStorage->code }}</x-table.td>
                    <x-table.td>{{ $dbWarehouseStorage->title }}</x-table.td>
                    <x-table.td>{{ $dbWarehouseStorage->WarehouseType->title }}</x-table.td>
                    <x-table.td>{{ $dbWarehouseStorage->CompanyEstablishment->title }}</x-table.td>
                    <x-table.td>
                        <x-button.btn-status 
                            condition="{{ $dbWarehouseStorage->is_active }}" 
                            route="{{ route('warehouse_storages.is_active', $dbWarehouseStorage->id) }}" 
                        />
                    </x-table.td>                    
                    <x-table.td>
                        <x-table.button.btn-group>
                            <x-table.button.btn-show href="{{ route('warehouse_storages.show', $dbWarehouseStorage->id) }}" />
                        </x-table.button.btn-group>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot
    </x-table.table>
</div>
