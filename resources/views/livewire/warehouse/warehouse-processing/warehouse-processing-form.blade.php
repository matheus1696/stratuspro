<div>
    <x-form.form-group>        
        <div class="col-span-12 md:col-span-12">
            <!-- Label para Estabelecimento -->
            <x-form.form-label for="establishment_id" value="Estabelecimento"/>

            <!-- Select para Escolha de Estabelecimento -->
            <x-form.form-select name="establishment_id" id="establishment_id">
                <!-- Opção padrão -->
                <option value="" disabled selected>Selecione um estabelecimento</option>

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
    </x-form.form-group>
</div>
