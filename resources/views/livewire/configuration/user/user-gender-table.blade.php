<div>
    <x-table.table>

        <!-- Inicio Slot Search -->
        @slot('search')
            <div class="flex justify-end gap-2 py-3">
                <div class="w-full md:w-40">
                    <!-- Filtros de Pesquisa -->
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Procurar por gênero" />
                </div>
            </div>
        @endslot

        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-24">Título</x-table.th>
            <x-table.th>Pais</x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbUserGenders as $dbUserGender)
                <x-table.tr>
                    <x-table.td>{{ $dbUserGender->acronym }}</x-table.td>
                    <x-table.td>{{ $dbUserGender->title }}</x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>