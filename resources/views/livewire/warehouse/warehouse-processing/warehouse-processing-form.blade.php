<div>
    <x-form.form-group>        
        <div class="col-span-12 md:col-span-12">
            <x-form.form-label for="establishment_id" value="Estabelecimento"/>
            <x-form.form-select name="establishment_id" id="establishment_id">
                <option value="" disabled selected>Selecione um estabelecimento</option>
                @foreach ($dbEstablishments as $dbEstablishment)
                    <option value="{{ $dbEstablishment->id }}" {{ old('establishment_id', $dbWarehouseStorage->establishment_id ?? '') == $dbEstablishment->id ? 'selected' : '' }}
                    >
                        {{ $dbEstablishment->title }}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="establishment_id" />
        </div>
    </x-form.form-group>
</div>
