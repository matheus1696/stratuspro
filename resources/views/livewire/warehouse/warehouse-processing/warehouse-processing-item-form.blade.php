<div>
    <x-form.form-group>
        
        <div class="col-span-12 md:col-span-10">
            <x-form.form-label for="product_id" value="Estabelecimento"/>
            <x-form.form-select name="product_id" id="product_id">
                @foreach ($dbWarehouseInventories as $dbWarehouseInventory)
                    <option value="{{ $dbWarehouseInventory->WarehouseProduct->id }}" {{ old('product_id') == $dbWarehouseInventory->WarehouseProduct->id ? 'selected' : '' }}
                    >
                        {{ $dbWarehouseInventory->WarehouseProduct->title }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="product_id" />
        </div>

        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="quantity" value="Quantidade"/>
            <x-form.form-input name="quantity" placeholder="1" required />
            <x-form.form-error for="quantity" />
        </div>

    </x-form.form-group>
</div>
