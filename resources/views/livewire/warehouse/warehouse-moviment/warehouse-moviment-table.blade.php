<div>    
    <x-table.table>
        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-24">Movimento</x-table.th>
            <x-table.th class="w-32">Data</x-table.th>
            <x-table.th class="w-20">B.F.</x-table.th>
            <x-table.th class="w-20">NF</x-table.th>
            <x-table.th class="w-20">O.F.</x-table.th>
            <x-table.th class="w-40">Fornecedor</x-table.th>
            <x-table.th class="w-40">Produto</x-table.th>
            <x-table.th class="w-20">Quant.</x-table.th>
            <x-table.th class="w-24">Valor</x-table.th>
            <x-table.th class="w-24">Total</x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbWarehouseMoviments as $dbWarehouseMoviment)
                <x-table.tr>
                    <x-table.td>
                        <div class="flex items-center justify-center gap-1.5 bg-green-300 rounded-full shadow-sm text-xs text-green-700 py-1">
                            <i class="fas fa-arrow-up rotate-45"></i>
                            {{$dbWarehouseMoviment->movement_type}}
                        </div>
                    </x-table.td>
                    <x-table.td>{{ date('d/m/Y H:i', strtotime($dbWarehouseMoviment->created_at)) }}</x-table.td>
                    <x-table.td>{{$dbWarehouseMoviment->CompanyFinancialBlock->acronym}}</x-table.td>
                    <x-table.td>{{$dbWarehouseMoviment->invoice_number}}</x-table.td>
                    <x-table.td>{{$dbWarehouseMoviment->supplier_order_number}}</x-table.td>
                    <x-table.td>{{$dbWarehouseMoviment->BusinessContractSupplier->supplier}}</x-table.td>
                    <x-table.td>{{$dbWarehouseMoviment->WarehouseProduct->title}}</x-table.td>  
                    <x-table.td>{{$dbWarehouseMoviment->quantity}}</x-table.td>      
                    <x-table.td>R$ {{ number_format($dbWarehouseMoviment->price, 2, ',', '.') }}</x-table.td>
                    <x-table.td>R$ {{ number_format($dbWarehouseMoviment->total_value, 2, ',', '.') }}</x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
