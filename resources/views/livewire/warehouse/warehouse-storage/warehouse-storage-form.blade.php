<div>
    <div class="grid grid-cols-12 gap-3">

        {{-- Código do Almoxarifado --}}
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="code" value="Código" />
            <x-form.form-input 
                name="code" 
                value="{{ old('code') ?? $dbWarehouseStorage->code ?? '' }}" 
                placeholder="Ex: 123456" 
                required 
            />
            <x-form.form-error for="code" />
        </div>
        
        {{-- Nome do Almoxarifado --}}
        <div class="col-span-12 md:col-span-10">
            <x-form.form-label for="title" value="Nome do Almoxarifado" />
            <x-form.form-input 
                name="title" 
                value="{{ old('title') ?? $dbWarehouseStorage->title ?? '' }}" 
                placeholder="Ex: Almoxarifado Central" 
                required 
            />
            <x-form.form-error for="title" />
        </div>
        
        {{-- Tipo de Almoxarifado --}}
        <div class="col-span-12 md:col-span-6">
            <x-form.form-label for="type_id" value="Tipo de Almoxarifado" />
            <x-form.form-select name="type_id" id="type_id" required>
                @foreach ($dbWarehouseStorageTypes as $dbWarehouseStorageType)
                    <option value="{{ $dbWarehouseStorageType->id }}" 
                        {{ old('type_id', $dbWarehouseStorage->type_id ?? '') == $dbWarehouseStorageType->id ? 'selected' : '' }}>
                        {{ $dbWarehouseStorageType->title }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="type_id" />
        </div>
        
        {{-- Estabelecimento --}}
        <div class="col-span-12 md:col-span-6">
            <x-form.form-label for="establishment_id" value="Estabelecimento" />
            <x-form.form-select name="establishment_id" id="establishment_id" required>
                @foreach ($dbEstablishments as $dbEstablishment)
                    <option value="{{ $dbEstablishment->id }}" 
                        {{ old('establishment_id', $dbWarehouseStorage->establishment_id ?? '') == $dbEstablishment->id ? 'selected' : '' }}>
                        {{ $dbEstablishment->title }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="establishment_id" />
        </div>

    </div>
</div>
