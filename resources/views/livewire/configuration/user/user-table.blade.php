<div>
    <x-table.table :paginate="$dbUsers">

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

                <div class="w-full md:w-48">
                    <!-- Filtros de Pesquisa -->
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Procurar por nome ou email" />
                </div>
            </div>
        @endslot

        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th>Nome</x-table.th>
            <x-table.th>Email</x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbUsers as $dbUser)
                <x-table.tr>
                    <x-table.td>{{ $dbUser->name }}</x-table.td>
                    <x-table.td>{{ $dbUser->email }}</x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>