<div>
    <x-form.form-group>
        <!-- Campo Nota Fiscal -->
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="invoice_number" value="Nº da Nota Fiscal" />
            <x-form.form-input 
                name="invoice_number" 
                value="{{ old('invoice_number') ?? $dbWarehouseInventory->invoice_number ?? '' }}" 
                placeholder="000.000" 
                required 
                autofocus
            />
            <x-form.form-error for="invoice_number" />
        </div>

        <!-- Campo O.F. (Ordem de Fornecimento) -->
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="supplier_order_number" value="Nº da O.F." />
            <x-form.form-input 
                name="supplier_order_number" 
                value="{{ old('supplier_order_number') ?? $dbWarehouseInventory->supplier_order_number ?? '' }}" 
                placeholder="0000.0000" 
                onkeyup="handleContract(event)" 
                maxlength="9" 
                required 
            />
            <x-form.form-error for="supplier_order_number" />
        </div>

        <!-- Campo Fornecedor -->
        <div class="col-span-12 md:col-span-5">
            <x-form.form-label for="supplier_id" value="Fornecedor" />
            <x-form.form-select name="supplier_id" id="supplier_id">
                @foreach ($dbBusinessSuppliers as $dbBusinessSupplier)
                    <option 
                        value="{{ $dbBusinessSupplier->id }}" 
                        {{ old('supplier_id', $dbWarehouseInventory->supplier_id ?? '') == $dbBusinessSupplier->id ? 'selected' : '' }}
                    >
                        {{ $dbBusinessSupplier->supplier }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="supplier_id" />
        </div>

        <!-- Campo Bloco de Financiamento -->
        <div class="col-span-12 md:col-span-3">
            <x-form.form-label for="financial_block_id" value="Bloco de Financiamento" />
            <x-form.form-select name="financial_block_id" id="financial_block_id">
                @foreach ($dbCompanyFinancialBlocks as $dbCompanyFinancialBlock)
                    <option 
                        value="{{ $dbCompanyFinancialBlock->id }}" 
                        {{ old('financial_block_id', $dbWarehouseInventory->financial_block_id ?? '') == $dbCompanyFinancialBlock->id ? 'selected' : '' }}
                    >
                        {{ $dbCompanyFinancialBlock->title }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="financial_block_id" />
        </div>

        <!-- Campo Produto -->
        <div class="col-span-12 md:col-span-8">
            <x-form.form-label for="product_id" value="Produto" />
            <x-form.form-select name="product_id" id="product_id">
                @foreach ($dbWarehouseProducts as $dbWarehouseProduct)
                    <option 
                        value="{{ $dbWarehouseProduct->id }}" 
                        {{ old('product_id', $dbWarehouseInventory->product_id ?? '') == $dbWarehouseProduct->id ? 'selected' : '' }}
                    >
                        {{ $dbWarehouseProduct->title }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="product_id" />
        </div>

        <!-- Campo Quantidade -->
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="quantity" value="Quantidade" />
            <x-form.form-input 
                type="number" 
                name="quantity" 
                value="{{ old('quantity') ?? $dbWarehouseInventory->quantity ?? '' }}" 
                min="0" 
                placeholder="0" 
                required
            />
            <x-form.form-error for="quantity" />
        </div>

        <!-- Campo Preço -->
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="price" value="Preço" />
            <x-form.form-input 
                type="number" 
                step="0.0001" 
                name="price" 
                value="{{ old('price') ?? $dbWarehouseInventory->price ?? '' }}" 
                min="0" 
                placeholder="0.01" 
                required 
            />
            <x-form.form-error for="price" />
        </div>

    </x-form.form-group>
</div>
