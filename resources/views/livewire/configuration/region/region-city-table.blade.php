<div>
    <x-table.table :paginate="$dbRegionCities">

        <!-- Inicio Slot Search -->
        @slot('search')
            <div class="flex justify-between gap-2 py-3">
                <div class="w-44 md:w-32">
                    <x-form.form-select wire:model.live="perPage">
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                        <option value="150">150 por página</option>
                        <option value="200">200 por página</option>
                        <option value="250">250 por página</option>
                    </x-form.form-select>
                </div>

                <div class="w-full md:w-40">
                    <!-- Filtros de Pesquisa -->
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Procurar por cidade" />
                </div>
            </div>
        @endslot
        
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-24">IBGE</x-table.th>
            <x-table.th>Cidade</x-table.th>
            <x-table.th class="w-24">Status</x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbRegionCities as $dbRegionCity)
                <x-table.tr>
                    <x-table.td>{{ $dbRegionCity->code }}</x-table.td>
                    <x-table.td>{{ $dbRegionCity->title }}</x-table.td>
                    <x-table.td>{{ $dbRegionCity->is_active }}</x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
