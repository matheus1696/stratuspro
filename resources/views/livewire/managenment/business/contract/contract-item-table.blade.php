<div>
    <x-table.table :paginate="$dbContractItems">

        <!-- Inicio Slot Search -->
        @slot('search')
            <div class="flex justify-between items-center gap-5 mt-2">
                <!-- Filtros de Pesquisa -->
                <div class="w-1/2 md:w-1/3">
                    <x-form.form-input type="text" id="search" wire:model.live.debounce.300ms="search"
                        placeholder="Buscar pelo Item" />
                </div>

                <div>
                    <x-button.link-primary href="{{ route('contract_items.create', $dbContract->id) }}"
                        value="Cadastrar Novo Item" class="bg-blue-600" />
                </div>
            </div>
        @endslot

        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-60" title="Descrição do Item">Item</x-table.th>
            <x-table.th class="w-20" title="Unidade de Medida">Med.</x-table.th>
            <x-table.th class="w-32" title="Valor Unitário">V. Un.</x-table.th>
            <x-table.th class="w-24" title="Quantidade Total">Qtd Tot.</x-table.th>
            <x-table.th class="w-24" title="Quantidade de Saldo">Qtd Saldo</x-table.th>
            <x-table.th class="w-32" title="Valor Total">V. Tot.</x-table.th>
            <x-table.th class="w-32" title="Valor em Saldo">V. Saldo</x-table.th>
            <x-table.th class="w-28"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbContractItems as $dbContractItem)
                <x-table.tr>
                    <x-table.td>{{ $dbContractItem->title }}</x-table.td>
                    <x-table.td>{{ $dbContractItem->ConfigurationUnit->acronym }}</x-table.td>
                    <x-table.td>R$ {{ number_format($dbContractItem->unit_price, 2, ',', '.') }}</x-table.td>

                    <x-table.td>{{ $dbContractItem->quantity_adm + $dbContractItem->quantity_atb + $dbContractItem->quantity_mac + $dbContractItem->quantity_vepd + $dbContractItem->quantity_vsan }}</x-table.td>

                    <x-table.td>{{ $dbContractItem->quantity_adm + $dbContractItem->quantity_atb + $dbContractItem->quantity_mac + $dbContractItem->quantity_vepd + $dbContractItem->quantity_vsan - $dbContractItem->request_adm + $dbContractItem->request_atb + $dbContractItem->request_mac + $dbContractItem->request_vepd + $dbContractItem->request_vsan }}</x-table.td>

                    <x-table.td>R$ {{ number_format($dbContractItem->total_price, 2, ',', '.') }}</x-table.td>

                    <x-table.td>R$ {{ number_format(($dbContractItem->total_price - $dbContractItem->request_price), 2, ',', '.') }}</x-table.td>

                    <x-table.td> 
                        
                        <x-table.button.btn-group>                            
                            <x-table.button.btn-modal title="Detalhe do Item: {{$dbContractItem->title}}">
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 text-start">
                                    
                                    <div><strong>CNPJ:</strong> {{ $dbContractItem->BusinessContractSupplier->cnpj }}</div>
                                    <div class="lg:col-span-2"><strong>Fornecedor:</strong> {{ $dbContractItem->BusinessContractSupplier->supplier }}</div>

                                    <div class="lg:col-span-3"><strong>Item:</strong> {{ $dbContractItem->title }}</div>
                                    <div class="lg:col-span-3"><strong>Descrição:</strong> {{ $dbContractItem->description }}</div>
                                    <div><strong>Unidade de Medida:</strong> {{ $dbContractItem->ConfigurationUnit->title }}</div>
                                    <div><strong>Valor Unitário:</strong> R$ {{ number_format($dbContractItem->unit_price, 2, ',', '.') }}</div>
                                    <div><strong>Valor Total:</strong> R$ {{ number_format($dbContractItem->total_price, 2, ',', '.') }}</div>

                                    <div class="lg:col-span-3 py-1 border-t border-gray-300">
                                        <x-table.table>                                            
                                            @slot('thead')                                            
                                                <x-table.th class="w-24 lg:w-60"></x-table.th>
                                                <x-table.th>ADM</x-table.th>
                                                <x-table.th>ATB</x-table.th>
                                                <x-table.th>MAC</x-table.th>
                                                <x-table.th>V. SAN</x-table.th>
                                                <x-table.th>V. EPD</x-table.th>
                                            @endslot

                                            @slot('tbody')
                                                <x-table.tr>
                                                    <x-table.td class="font-bold">Quantidade Total</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->quantity_adm }}</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->quantity_atb }}</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->quantity_mac }}</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->quantity_vsan }}</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->quantity_vepd }}</x-table.td>
                                                </x-table.tr>
                                                
                                                <x-table.tr>
                                                    <x-table.td class="font-bold">Quantidade Solicitada</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->request_adm }}</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->request_atb }}</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->request_mac }}</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->request_vsan }}</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->request_vepd }}</x-table.td>
                                                </x-table.tr>
                                                
                                                <x-table.tr>
                                                    <x-table.td class="font-bold">Saldo Atual</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->quantity_adm - $dbContractItem->request_adm }}</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->quantity_atb - $dbContractItem->request_atb }}</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->quantity_mac - $dbContractItem->request_mac }}</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->quantity_vsan - $dbContractItem->request_vsan }}</x-table.td>
                                                    <x-table.td>{{ $dbContractItem->quantity_vepd - $dbContractItem->request_vepd }}</x-table.td>
                                                </x-table.tr>
                                                                                                
                                            @endslot
                                        </x-table.table>
                                    </div>
                                </div>
                            </x-table.button.btn-modal>

                            <x-table.button.btn-edit href="{{ route('contract_items.edit', $dbContractItem->id) }}"/>
                            
                        </x-table.button.btn-group> 
                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
