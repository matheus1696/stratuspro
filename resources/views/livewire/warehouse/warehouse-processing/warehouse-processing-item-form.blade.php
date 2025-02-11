<div>
    <x-form.form-group>
        
        <!-- Seção para seleção de produto -->
        <div class="col-span-12 md:col-span-8">
            <x-form.form-label for="product_id" value="Produto"/>
            <x-form.form-select name="product_id" id="product_id" wire:model.live.debounce.300ms="product_id">
                <!-- Iteração para listar os produtos disponíveis no estoque -->
                @foreach ($dbWarehouseInventories as $dbWarehouseInventory)
                    <option value="{{ $dbWarehouseInventory->WarehouseProduct->id }}" 
                        {{ old('product_id') == $dbWarehouseInventory->WarehouseProduct->id ? 'selected' : '' }}>
                        {{ $dbWarehouseInventory->WarehouseProduct->title }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="product_id" />
        </div>

        <!-- Seção para exibição de estoque atual -->
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label value="Estoque Atual"/>
            <x-form.form-input disabled wire:model.live.debounce.300ms="current_inventory"/>
        </div>

        <!-- Seção para input da quantidade -->
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="quantity" value="Quantidade"/>
            <x-form.form-input name="quantity" placeholder="1" required />
            <x-form.form-error for="quantity" />
        </div>

    </x-form.form-group>
</div>
