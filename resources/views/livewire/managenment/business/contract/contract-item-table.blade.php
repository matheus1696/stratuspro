<div>
    <x-table.table :paginate="$dbContractItems">

        <!-- Inicio Slot Search -->
        @slot('search')
            <div class="flex justify-between items-center mt-2">
                <!-- Filtros de Pesquisa -->
                <div class="w-80">
                    <x-form.form-input type="text" id="search" wire:model.live.debounce.300ms="search"
                        placeholder="Buscar pelo Item" />
                </div>

                <div>
                    <x-button.link-primary href="{{ route('contract_items.create', $dbContract->id)}}" value="Cadastrar Novo Item" class="bg-blue-600" />
                </div>
            </div>

        @endslot

        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-80">Item</x-table.th>
            <x-table.th class="w-20">Medida</x-table.th>
            <x-table.th class="w-24">Q. Total</x-table.th>
            <x-table.th class="w-24">Q. Solicitado</x-table.th>
            <x-table.th class="w-20">Saldo</x-table.th>
            <x-table.th class="w-20">Valor Uni.</x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbContractItems as $dbContractItem)
                <x-table.tr>
                    <x-table.td>{{ $dbContractItem->title }}</x-table.td>
                    <x-table.td>{{ $dbContractItem->ConfigurationUnit->title }}</x-table.td>
                    <x-table.td>{{ $dbContractItem->quantity_adm + $dbContractItem->quantity_atb + $dbContractItem->quantity_mac + $dbContractItem->quantity_vepd + $dbContractItem->quantity_vsan}}</x-table.td>
                    
                    <x-table.td>{{ $dbContractItem->request_adm + $dbContractItem->request_atb + $dbContractItem->request_mac + $dbContractItem->request_vepd + $dbContractItem->request_vsan}}</x-table.td>

                    <x-table.td>{{ $dbContractItem->quantity_adm + $dbContractItem->quantity_atb + $dbContractItem->quantity_mac + $dbContractItem->quantity_vepd + $dbContractItem->quantity_vsan - $dbContractItem->request_adm + $dbContractItem->request_atb + $dbContractItem->request_mac + $dbContractItem->request_vepd + $dbContractItem->request_vsan}}</x-table.td>
                    
                    <x-table.td>{{ $dbContractItem->unit_price }}</x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
