<div>
    <x-form.form-group>     
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="invoice" value="Nota Fiscal"/>
            <x-form.form-input name="invoice" value="{{ old('invoice') ?? $dbWarehouseInventory->invoice ?? ''}}" placeholder="000.000" required />
            <x-form.form-error for="invoice" />
        </div>

        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="number_supplier" value="O.F."/>
            <x-form.form-input name="number_supplier" value="{{ old('number_supplier') ?? $dbWarehouseInventory->number_supplier ?? ''}}" placeholder="0000.0000" required />
            <x-form.form-error for="number_supplier" />
        </div>

        <div class="col-span-12 md:col-span-8">
            <x-form.form-label for="supplier_id" value="Fornecedor"/>
            <x-form.form-select name="supplier_id" id="supplier_id">
                @foreach ($dbBusinessSuppliers as $dbBusinessSupplier)
                    <option value="{{ $dbBusinessSupplier->id }}" {{ old('supplier_id', $dbWarehouseInventory->supplier_id ?? '') == $dbBusinessSupplier->id ? 'selected' : '' }}
                    >
                        {{ $dbBusinessSupplier->supplier }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="supplier_id" />
        </div>
        
        <div class="col-span-12 md:col-span-8">
            <x-form.form-label for="product_id" value="Produto"/>
            <x-form.form-select name="product_id" id="product_id">
                @foreach ($dbWarehouseProducts as $dbWarehouseProduct)
                    <option value="{{ $dbWarehouseProduct->id }}" {{ old('product_id', $dbWarehouseInventory->product_id ?? '') == $dbWarehouseProduct->id ? 'selected' : '' }}
                    >
                        {{ $dbWarehouseProduct->title }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="product_id" />
        </div>

        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="quantity" value="Quantidade"/>
            <x-form.form-input type="number" name="quantity" value="{{ old('quantity') ?? $dbWarehouseInventory->quantity ?? ''}}" min="0" required />
            <x-form.form-error for="quantity" />
        </div>

        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="price" value="Valor UND"/>
            <x-form.form-input type="number" step="0.01" name="price" value="{{ old('price') ?? $dbWarehouseInventory->price ?? ''}}" min="0" required />
            <x-form.form-error for="price" />
        </div>

    </x-form.form-group>
</div>
