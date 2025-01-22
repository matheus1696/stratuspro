<div>
    <x-table.table :paginate="$dbStockControls">
        @slot('search')
            <div class="flex justify-between gap-2">
                <div class="w-44 md:w-32">
                    <x-form.form-select wire:model.live="perPage">
                        <option value="10" selected>10 por página</option>
                        <option value="20">20 por página</option>
                        <option value="30">30 por página</option>
                        <option value="40">40 por página</option>
                        <option value="50">50 por página</option>
                    </x-form.form-select>
                </div>

                <div class="w-full md:w-80">
                    <!-- Filtros de Pesquisa -->
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Nome do estoque" />
                </div>
            </div>
        @endslot
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-24">Código</x-table.th>
            <x-table.th>Estoque</x-table.th>
            <x-table.th class="w-60">Estabelecimento</x-table.th>
            <x-table.th class="w-28">Status</x-table.th>
            <x-table.th class="w-16"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbStockControls as $dbStockControl)
                <x-table.tr>
                    <x-table.td>{{$dbStockControl->code}}</x-table.td>
                    <x-table.td>{{$dbStockControl->title}}</x-table.td>
                    <x-table.td>{{$dbStockControl->CompanyEstablishment->title}}</x-table.td>
                    <x-table.td>
                        <x-button.btn-status condition="{{ $dbStockControl->is_active }}" route="{{ route('warehouse_stock_controls.is_active', $dbStockControl->id)}}" />
                    </x-table.td>                    
                    <x-table.td></x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>