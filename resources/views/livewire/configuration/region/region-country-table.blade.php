<div>
    <x-table.table :paginate="$dbRegionCountries">

        <!-- Inicio Slot Search -->
        @slot('search')
            <div class="flex justify-between gap-2">
                <div class="w-44 md:w-32">
                    <x-form.form-select wire:model.live="perPage">
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                        <option value="150">150 por página</option>
                        <option value="200">200 por página</option>
                        <option value="250">250 por página</option>
                    </x-form.form-select>
                </div>

                <div class="w-full md:w-60">
                    <!-- Filtros de Pesquisa -->
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Procurar por pais" />
                </div>
            </div>
        @endslot
        
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-24">Sigla</x-table.th>
            <x-table.th>Paises</x-table.th>
            <x-table.th class="w-24"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbRegionCountries as $dbRegionCountry)
                <x-table.tr>
                    <x-table.td>{{ $dbRegionCountry->acronym }}</x-table.td>
                    <x-table.td>{{ $dbRegionCountry->title }}</x-table.td>
                    <x-table.td>
                        <x-button.btn-status route="{{ route('countries.update', $dbRegionCountry->id) }}" condition="{{ $dbRegionCountry->is_active }}" />
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
