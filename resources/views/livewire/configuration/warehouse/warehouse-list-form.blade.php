<div>
    <x-form.form-group>
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="code" value="Código"/>
            <x-form.form-input name="code" value="{{ old('code') ?? $dbWarehouse->code ?? ''}}" placeholder="123456" required />
            <x-form.form-error for="code" />
        </div>
        
        <div class="col-span-12 md:col-span-10">
            <x-form.form-label for="title" value="Nome do Almoxarifado"/>
            <x-form.form-input name="title" value="{{ old('title') ?? $dbWarehouse->title ?? ''}}" placeholder="Nome Completo" required />
            <x-form.form-error for="title" />
        </div>
        
        <div class="col-span-12 md:col-span-6">
            <x-form.form-label for="type_id" value="Tipo de Almoxarifado"/>
            <x-form.form-select name="type_id" id="type_id">
                <option value="" disabled selected>Selecione um estabelecimento</option>
                @foreach ($dbWarehouseTypes as $dbWarehouseType)
                    <option value="{{ $dbWarehouseType->id }}" {{ old('type_id', $dbWarehouse->type_id ?? '') == $dbWarehouseType->id ? 'selected' : '' }}
                    >
                        {{ $dbWarehouseType->title }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="type_id" />
        </div>
        
        <div class="col-span-12 md:col-span-6">
            <x-form.form-label for="establishment_id" value="Estabelecimento"/>
            <x-form.form-select name="establishment_id" id="establishment_id">
                <option value="" disabled selected>Selecione um estabelecimento</option>
                @foreach ($dbEstablishments as $dbEstablishment)
                    <option value="{{ $dbEstablishment->id }}" {{ old('establishment_id', $dbWarehouse->establishment_id ?? '') == $dbEstablishment->id ? 'selected' : '' }}
                    >
                        {{ $dbEstablishment->title }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="establishment_id" />
        </div>
    </x-form.form-group>
</div>
