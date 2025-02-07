<div>
    <x-table.table>

        <!-- Inicio Slot Search -->
        @slot('search')
            <x-pages.conteiner class="px-3 py-3">
                <p class="font-bold uppercase text-sm pl-1 text-gray-400"> <i class="fas fa-filter text-xs"></i> Filtros:</p>
                <div class="grid grid-cols-12 gap-3">

                    <!-- Filtros de Pesquisa -->
                    <div class="col-span-3 md:col-span-2">
                        <x-form.form-label for="auction" value="Data de Criação" />
                        <x-form.form-input type="date" id="auction" wire:model.live.debounce.300ms="created_at" />
                    </div>
                    <!-- Filtros de Pesquisa -->
                    <div class="col-span-3 md:col-span-2">
                        <x-form.form-label for="process" value="Ticket" />
                        <x-form.form-input type="text" id="process" wire:model.live.debounce.300ms="ticket" placeholder="{{ now()->format('Ymd') }}000001" />
                    </div>
                    <!-- Filtros de Pesquisa -->
                    <div class="col-span-6 md:col-span-8">
                        <x-form.form-label for="titulo" value="Unidade" />
                        <x-form.form-input type="text" id="titulo" wire:model.live.debounce.300ms="establishment_id" />
                    </div>
                </div>
            </x-pages.conteiner>
        @endslot

        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-24">Data</x-table.th>
            <x-table.th class="w-24">Ticket</x-table.th>
            <x-table.th class="w-80">Unidade</x-table.th>
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
                        <x-table.button.btn-group>
                            <x-table.button.btn-show href=" {{ route('warehouse_processings.show', $dbWarehouseProcessing->id) }}" />
                        </x-table.button.btn-group>
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
