<div>
    <x-table.table>

        <!-- Inicio Slot Search -->
        @slot('search')
            <div class="flex justify-end gap-2 py-3">
                <div class="w-full md:w-40">
                    <!-- Filtros de Pesquisa -->
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Procurar por estado" />
                </div>
            </div>
        @endslot
        
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-24">Sigla</x-table.th>
            <x-table.th>Pais</x-table.th>
            <x-table.th class="w-24"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbRegionStates as $dbRegionState)
                <x-table.tr>
                    <x-table.td>{{ $dbRegionState->acronym }}</x-table.td>
                    <x-table.td>{{ $dbRegionState->title }}</x-table.td>
                    <x-table.td>{{ $dbRegionState->is_active }}</x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
