<div>

    <div>
        @if (count($dbWarehouseStorages) < 1)
            <div class="h-96 w-full flex justify-center items-center">
                <p class="text-lg font-bold">Solicite seu acesso ao almoxarifado de sua unidade</p>
            </div>
        @else
        
            <x-table.table>
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
                            <div class="w-full md:w-80">
                                <!-- Filtros de Pesquisa -->
                                <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Nome do almoxarifado" />
                            </div>
                        </div>
                    </div>
                @endslot
                <!-- Inicio Slot THead -->
                @slot('thead')
                    <x-table.th class="w-24">Código</x-table.th>
                    <x-table.th class="w-80">Almoxarifado</x-table.th>
                    <x-table.th class="w-40">Estabelecimento</x-table.th>
                    <x-table.th class="w-16"></x-table.th>
                @endslot

                <!-- Inicio Slot TBody -->
                @slot('tbody')
                    @foreach ($dbWarehouseStorages as $dbWarehouseStorage)
                        <x-table.tr>
                            <x-table.td>{{$dbWarehouseStorage->code}}</x-table.td>
                            <x-table.td>{{$dbWarehouseStorage->title}}</x-table.td>
                            <x-table.td>{{$dbWarehouseStorage->CompanyEstablishment->title}}</x-table.td>                   
                            <x-table.td>
                                <x-table.button.btn-group>
                                    <x-table.button.btn-show href="{{ route('warehouse_inventories.show', $dbWarehouseStorage->id)}}" />
                                </x-table.button.btn-group>
                            </x-table.td>
                        </x-table.tr>
                    @endforeach
                @endslot

            </x-table.table>
            
        @endif
    </div>
</div>