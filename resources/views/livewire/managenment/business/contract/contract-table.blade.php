<div>
    <x-table.table :paginate="$dbContracts">

        <!-- Inicio Slot Search -->
        @slot('search')
            <div class="grid grid-cols-12 justify-between gap-2 py-3">

                <!-- Filtros de Pesquisa -->
                <div class="col-span-3 md:col-span-1">
                    <x-form.form-label for="process" value="Nº PL" />
                    <x-form.form-input type="text" id="process" wire:model.live.debounce.300ms="process"
                        placeholder="000-{{ now()->format('Y') }}" />
                </div>
                <!-- Filtros de Pesquisa -->
                <div class="col-span-3 md:col-span-1">
                    <x-form.form-label for="auction" value="Nº Pregão" />
                    <x-form.form-input type="text" id="auction" wire:model.live.debounce.300ms="auction"
                        placeholder="000-{{ now()->format('Y') }}" />
                </div>
                <!-- Filtros de Pesquisa -->
                <div class="col-span-6 md:col-span-4">
                    <x-form.form-label for="titulo" value="Título do Processo" />
                    <x-form.form-input type="text" id="titulo" wire:model.live.debounce.300ms="titulo"
                        placeholder="Título do Processo" />
                </div>
                <!-- Filtros de Pesquisa -->
                <div class="col-span-4 md:col-span-2">
                    <x-form.form-label for="start_date" value="Data Início" />
                    <x-form.form-input type="date" id="start_date" wire:model.live.debounce.300ms="start_date" />
                </div>
                <!-- Filtros de Pesquisa -->
                <div class="col-span-4 md:col-span-2">
                    <x-form.form-label for="end_date" value="Data Fim" />
                    <x-form.form-input type="date" id="end_date" wire:model.live.debounce.300ms="end_date" />
                </div>

                <div class="col-span-4 md:col-span-2">
                    <x-form.form-label for="status" value="Status" />
                    <x-form.form-select id="status" wire:model.live="status">
                        <option value="Todos">Todos</option>
                        @foreach ($dbStatuses as $dbStatus)
                            <option value="{{ $dbStatus->id }}">{{ $dbStatus->title }}</option>
                        @endforeach
                    </x-form.form-select>
                </div>                
            </div>
        @endslot

        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-20">PL</x-table.th>
            <x-table.th class="w-20">Pregão</x-table.th>
            <x-table.th>Título</x-table.th>
            <x-table.th class="w-28">Data Início</x-table.th>
            <x-table.th class="w-28">Data Fim</x-table.th>
            <x-table.th class="w-28">Status</x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbContracts as $dbContract)
                <x-table.tr>
                    <x-table.td>{{ $dbContract->number_process_bidding }}</x-table.td>
                    <x-table.td>{{ $dbContract->number_auction }}</x-table.td>
                    <x-table.td>{{ $dbContract->title }}</x-table.td>
                    <x-table.td>{{ $dbContract->start_date }}</x-table.td>
                    <x-table.td>{{ $dbContract->end_date }}</x-table.td>
                    <x-table.td>{{ $dbContract->ContractStatus->title }}</x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>