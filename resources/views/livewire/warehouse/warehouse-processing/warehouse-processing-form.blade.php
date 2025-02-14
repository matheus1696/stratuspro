<div>
    <div class="grid grid-cols-12 gap-3">
        <div class="col-span-12 md:col-span-12">
            <!-- Label para Estabelecimento -->
            <x-form.form-label for="establishment_id" value="Estabelecimento"/>

            <!-- Select para Escolha de Estabelecimento -->
            <x-form.form-select name="establishment_id" id="establishment_id">
                <!-- Loop para listar os estabelecimentos -->
                @foreach ($dbEstablishments as $dbEstablishment)
                    <option value="{{ $dbEstablishment->id }}" 
                        {{ old('establishment_id', $dbWarehouseStorage->establishment_id ?? '') == $dbEstablishment->id ? 'selected' : '' }}>
                        {{ $dbEstablishment->title }}
                    </option>
                @endforeach
            </x-form.form-select>

            <!-- Exibição de erros, caso haja -->
            <x-form.form-error for="establishment_id" />
        </div>
    </div>
</div>
