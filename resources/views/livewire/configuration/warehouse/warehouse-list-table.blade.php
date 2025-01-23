<div>
    <x-table.table :paginate="$dbWarehouses">
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

                <div class="flex justify-end gap-2">
                    <div class="w-44">
                        <x-form.form-select wire:model.live="typeId">
                            <option value="" selected>Todos</option>
                            @foreach ($dbWarehouseTypes as $dbWarehouseType)
                                <option value="{{ $dbWarehouseType->id }}">{{ $dbWarehouseType->title }}</option>
                            @endforeach
                        </x-form.form-select>
                    </div>

                    <div class="w-full md:w-80">
                        <!-- Filtros de Pesquisa -->
                        <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Nome do almoxarifado" />
                    </div>
                </div>
            </div>
        @endslot
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-32">Código</x-table.th>
            <x-table.th>Almoxarifado</x-table.th>
            <x-table.th class="w-32">Tipo</x-table.th>
            <x-table.th class="w-60">Estabelecimento</x-table.th>
            <x-table.th class="w-28">Status</x-table.th>
            <x-table.th class="w-16"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbWarehouses as $dbWarehouse)
                <x-table.tr>
                    <x-table.td>{{$dbWarehouse->code}}</x-table.td>
                    <x-table.td>{{$dbWarehouse->title}}</x-table.td>
                    <x-table.td>{{$dbWarehouse->WarehouseType->title}}</x-table.td>
                    <x-table.td>{{$dbWarehouse->CompanyEstablishment->title}}</x-table.td>
                    <x-table.td>
                        <x-button.btn-status condition="{{ $dbWarehouse->is_active }}" route="{{ route('warehouses.is_active', $dbWarehouse->id)}}" />
                    </x-table.td>                    
                    <x-table.td>
                        <x-table.button.btn-group>
                            <x-table.button.btn-show href="{{ route('warehouses.show', $dbWarehouse->id)}}" />
                        </x-table.button.btn-group>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>