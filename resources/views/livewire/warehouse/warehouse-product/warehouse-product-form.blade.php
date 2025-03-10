<div>
    <x-form.form-group>
        <!-- Código de Barra -->
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="barcode" value="Código de Barra" />
            <x-form.form-input name="barcode" value="{{ old('barcode') ?? $dbWarehouseProduct->barcode ?? '' }}" placeholder="00000000000000" required />
            <x-form.form-error for="barcode" />
        </div>

        <!-- Produto -->
        <div class="col-span-12 md:col-span-10">
            <x-form.form-label for="title" value="Produto" />
            <x-form.form-input name="title" value="{{ old('title') ?? $dbWarehouseProduct->title ?? '' }}" placeholder="Nome Completo" required />
            <x-form.form-error for="title" />
        </div>

        <!-- Categoria -->
        <div class="col-span-12 md:col-span-12">
            <x-form.form-label for="category_id" value="Categoria" />
            <x-form.form-select name="category_id" id="category_id">
                @foreach ($dbProductCategories as $dbProductCategory)
                    <option value="{{ $dbProductCategory->id }}" 
                            {{ old('category_id', $dbWarehouseProduct->category_id ?? '') == $dbProductCategory->id ? 'selected' : '' }}>
                        {{ $dbProductCategory->title }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="category_id" />
        </div>
        
        <!-- Descrição -->
        <div class="col-span-12 md:col-span-12">
            <x-form.form-label for="description" value="Descrição" />
            <x-form.form-textarea name="description">{{ old('description') ?? $dbWarehouseProduct->description ?? '' }}</x-form.form-textarea>
            <x-form.form-error for="description" />
        </div>
    </x-form.form-group>
</div>
