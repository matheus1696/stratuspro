<div>
    <x-form.form-group>
        <div class="col-span-12">
            <x-form.form-label for="title" value="Título do Item" />
            <x-form.form-input id="title" name="title" value="{{ old('title') ?? ($dbContractItem->title ?? '') }}"
                placeholder="Título do item" required />
            <x-form.form-error for="title" />
        </div>

        <div class="col-span-12">
            <x-form.form-label for="description" value="Descrição" />
            <x-form.form-textarea id="description" name="description" placeholder="Descrição do item"
                required>{{ old('description') ?? ($dbContractItem->description ?? '') }}</x-form.form-textarea>
            <x-form.form-error for="description" />
        </div>

        <div class="col-span-12 lg:col-span-6">
            <div class="relative">
                <x-form.form-label for="supplier_id" value="Fornecedor" />
                <x-form.form-input
                    type="text"
                    wire:model.live="query"
                    placeholder="Digite para buscar um fornecedor"
                    class="form-input w-full"
                />
            
                @if (!empty($suppliers))
                    <div class="absolute bg-white border rounded mt-1 w-full shadow">
                        @foreach($suppliers as $supplier)
                            <div wire:click="selectSupplier({{ $supplier->id }})" class="text-sm cursor-pointer px-3 py-2 hover:bg-blue-100">
                            {{ $supplier->cnpj }} - {{ $supplier->supplier }}
                            </div>
                        @endforeach
                    </div>
                @endif
            
                @if ($selectedSupplier)
                    <input type="hidden" name="supplier_id" value="{{ $selectedSupplier->id }}">
                @endif
            </div>            
            <x-form.form-error for="supplier_id" />
        </div>        

        <div class="col-span-6 lg:col-span-3">
            <x-form.form-label for="unit_id" value="Unidade de Medida" />
            <x-form.form-select id="unit_id" name="unit_id">
                @foreach ($dbUnits as $dbUnit)
                    <option value="{{ $dbUnit->id }}"
                        {{ (old('unit_id') ?? ($dbContractItem->unit_id ?? '')) == $dbUnit->id ? 'selected' : '' }}>
                        {{ $dbUnit->title }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="unit_id" />
        </div>

        <div class="col-span-6 lg:col-span-3">
            <x-form.form-label for="unit_price" value="Valor Unitário R$ " />
            <x-form.form-input type="number" step="0.01" id="unit_price" name="unit_price"
                value="{{ old('unit_price') ?? ($dbContractItem->unit_price ?? '') }}" placeholder="0,01" required />
            <x-form.form-error for="unit_price" />
        </div>

        <div class="col-span-12 grid grid-cols-5 gap-3">
            @foreach ($dbFinancialBlocks as $dbFinancialBlock)
                @php
                    // Verifica se o FinancialBlock está vinculado ao contrato
                    $isLinked = $dbContract->FinancialBlocks->contains('id', $dbFinancialBlock->id);
                @endphp

                @if ($isLinked)
                    <div>
                        <x-form.form-label for="financial_block_{{ $dbFinancialBlock->id }}" :value="$dbFinancialBlock->acronym"
                            class="md:hidden" />
                        <x-form.form-label for="financial_block_{{ $dbFinancialBlock->id }}" :value="$dbFinancialBlock->title"
                            class="hidden md:inline-block" />
                        <x-form.form-input type="number" id="financial_block_{{ $dbFinancialBlock->id }}"
                            name="quantity_{{ $dbFinancialBlock->code }}" placeholder="1"
                            value="{{ old('quantity_' . $dbFinancialBlock->code) ?? data_get($dbContractItem, 'quantity_' . $dbFinancialBlock->code, '') }}" />
                        <x-form.form-error for="financialBlock.{{ $dbFinancialBlock->id }}" />
                    </div>
                @else
                    <div>
                        <x-form.form-label :value="$dbFinancialBlock->acronym" class="md:hidden" />
                        <x-form.form-label :value="$dbFinancialBlock->title" class="hidden md:inline-block" />
                        <x-form.form-input disabled value="0" />
                    </div>
                @endif
            @endforeach
        </div>
    </x-form.form-group>
</div>
