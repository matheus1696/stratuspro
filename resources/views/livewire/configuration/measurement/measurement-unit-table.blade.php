<div>
    <x-table.table>

        <!-- Inicio Slot Search -->
        @slot('search')
            <div class="flex justify-end gap-2">
                <div class="w-full md:w-60">
                    <!-- Filtros de Pesquisa -->
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Procurar por Unidade de Medida" />
                </div>
            </div>
        @endslot

        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-24">Sigla</x-table.th>
            <x-table.th>Unidade de Medida</x-table.th>
            <x-table.th class="w-24">Status</x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbMeasurementUnits as $dbMeasurementUnit)
                <x-table.tr>
                    <x-table.td>{{ $dbMeasurementUnit->acronym }}</x-table.td>
                    <x-table.td>{{ $dbMeasurementUnit->title }}</x-table.td>
                    <x-table.td>
                        <x-button.btn-status route="{{ route('measurement_units.update', $dbMeasurementUnit->id) }}" condition="{{ $dbMeasurementUnit->is_active }}" />
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
