<div>
    <x-table.table>

        <!-- Início do Slot de Filtros -->
        @slot('search')
            <x-pages.container>
                <div class="grid grid-cols-12 gap-3">
                    <!-- Filtro de Data de Criação -->
                    <div class="col-span-12 md:col-span-2">
                        <x-form.form-label for="date" value="Data de Criação" />
                        <x-form.form-input type="date" id="date" wire:model.live.debounce.300ms="date" />
                    </div>

                    <!-- Filtro de Ticket -->
                    <div class="col-span-12 md:col-span-2">
                        <x-form.form-label for="ticket" value="Ticket" />
                        <x-form.form-input id="ticket" wire:model.live.debounce.300ms="ticket" placeholder="{{ now()->format('Ymd') }}000001" />
                    </div>

                    <!-- Filtro de Unidade -->
                    <div class="col-span-12 md:col-span-5">
                        <x-form.form-label for="establishment" value="Unidade" />
                        <x-form.form-select id="establishment" defaultOption="Todos" wire:model.live.debounce.300ms="establishment">
                            @foreach ($dbEstablishments as $dbEstablishment)
                                <option value="{{ $dbEstablishment->id }}">
                                    {{ $dbEstablishment->title }}
                                </option>
                            @endforeach
                        </x-form.form-select>
                    </div>

                    <!-- Filtro de Processamento -->
                    <div class="col-span-12 md:col-span-3">
                        <x-form.form-label for="processing" value="Processamento" />
                        <x-form.form-select id="processing" defaultOption="Todos" wire:model.live.debounce.300ms="processing">
                            @foreach ($dbWarehouseProcessingCategories as $dbWarehouseProcessingCategory)
                                <option value="{{ $dbWarehouseProcessingCategory->id }}">
                                    {{ $dbWarehouseProcessingCategory->title }}
                                </option>
                            @endforeach
                        </x-form.form-select>
                    </div>
                </div>
            </x-pages.container>
        @endslot

        <!-- Início do Slot de Cabeçalho da Tabela -->
        @slot('thead')
            <x-table.th class="w-24">Data</x-table.th>
            <x-table.th class="w-24">Ticket</x-table.th>
            <x-table.th class="w-80">Unidade</x-table.th>
            <x-table.th class="w-24">Processamento</x-table.th>
            <x-table.th class="w-10"></x-table.th>
        @endslot

        <!-- Início do Slot de Corpo da Tabela -->
        @slot('tbody')
            @foreach ($dbWarehouseProcessings as $dbWarehouseProcessing)
                <x-table.tr>
                    <x-table.td>{{ date('d/m/Y H:i', strtotime($dbWarehouseProcessing->created_at)) }}</x-table.td>
                    <x-table.td>{{ $dbWarehouseProcessing->ticket }}</x-table.td>
                    <x-table.td>{{ $dbWarehouseProcessing->CompanyEstablishment->title }}</x-table.td>
                    <x-table.td>
                        <div class="flex items-center justify-center gap-1.5 rounded-full shadow-sm text-xs text-gray-800 py-1 {{ $dbWarehouseProcessing->WarehouseProcessingCategory->color }}">
                            {{ $dbWarehouseProcessing->WarehouseProcessingCategory->title }}
                        </div>
                    </x-table.td>
                    <x-table.td>
                        <x-table.button.btn-group>
                            <x-table.button.btn-show href="{{ route('warehouse_processings.show', $dbWarehouseProcessing->id) }}" />
                        </x-table.button.btn-group>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
