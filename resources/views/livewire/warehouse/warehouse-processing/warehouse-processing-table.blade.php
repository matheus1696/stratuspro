<div>
    <x-table.table>

        <!-- Inicio Slot Search -->
        @slot('search')
            <x-pages.conteiner class="px-3 py-3">
                <p class="font-bold uppercase text-sm pl-1 text-gray-400"> <i class="fas fa-filter text-xs"></i> Filtros:</p>
                <div class="grid grid-cols-12 gap-3">

                    <!-- Filtros de Pesquisa -->
                    <div class="col-span-12 md:col-span-2">
                        <x-form.form-label for="date" value="Data de Criação" />
                        <x-form.form-input type="date" id="date" wire:model.live.debounce.300ms="date" />
                    </div>
                    <!-- Filtros de Pesquisa -->
                    <div class="col-span-12 md:col-span-2">
                        <x-form.form-label for="ticket" value="Ticket" />
                        <x-form.form-input id="ticket" wire:model.live.debounce.300ms="ticket" placeholder="{{ now()->format('Ymd') }}000001" />
                    </div>
                    <!-- Filtros de Pesquisa -->
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
                    <!-- Filtros de Pesquisa -->
                    <div class="col-span-12 md:col-span-3">
                        <x-form.form-label for="procesing" value="Processamento" />
                        <x-form.form-select id="procesing" defaultOption="Todos" wire:model.live.debounce.300ms="procesing">
                            @foreach ($dbWarehouseProcessingCategories as $dbWarehouseProcessingCategory)
                                <option value="{{ $dbWarehouseProcessingCategory->id }}">
                                    {{ $dbWarehouseProcessingCategory->title }}
                                </option>
                            @endforeach
                        </x-form.form-select>
                    </div>
                </div>
            </x-pages.conteiner>
        @endslot

        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-24">Data</x-table.th>
            <x-table.th class="w-24">Ticket</x-table.th>
            <x-table.th class="w-80">Unidade</x-table.th>
            <x-table.th class="w-24">Processamento</x-table.th>
            <x-table.th class="w-10"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
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
                            <x-table.button.btn-show href=" {{ route('warehouse_processings.show', $dbWarehouseProcessing->id) }}" />
                        </x-table.button.btn-group>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
