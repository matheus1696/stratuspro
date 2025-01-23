<div>
    <x-form.form-group>        
        <div class="col-span-12 md:col-span-12">
            <x-form.form-label for="title" value="Item"/>
            <x-form.form-input name="title" value="{{ old('title') ?? $dbWarehouseItem->title ?? ''}}" placeholder="Nome Completo" required />
            <x-form.form-error for="title" />
        </div>
        
        <div class="col-span-12 md:col-span-12">
            <x-form.form-label for="description" value="Descrição"/>
            <x-form.form-textarea name="description">{{ old('description') ?? $dbWarehouseItem->description ?? ''}}</x-form.form-textarea>
            <x-form.form-error for="description" />
        </div>
    </x-form.form-group>
</div>
