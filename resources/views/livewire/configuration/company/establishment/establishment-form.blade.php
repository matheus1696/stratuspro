<div>
    <x-form.form-group>
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="code" value="Código"/>
            <x-form.form-input name="code" value="{{ old('code') ?? $dbEstablishment->code ?? ''}}" placeholder="123456" required />
            <x-form.form-error for="code" />
        </div>
        
        <div class="col-span-12 md:col-span-10">
            <x-form.form-label for="title" value="Nome da Unidade"/>
            <x-form.form-input name="title" value="{{ old('title') ?? $dbEstablishment->title ?? ''}}" placeholder="Nome Completo" required />
            <x-form.form-error for="title" />
        </div>
        
        <div class="col-span-12">
            <x-form.form-label for="surname" value="Nome Fantasia (Apelido)"/>
            <x-form.form-input name="surname" value="{{ old('surname') ?? $dbEstablishment->surname ?? '' }}" placeholder="Nome Fantasia" />
            <x-form.form-error for="surname" />
        </div>
        
        <div class="col-span-12 md:col-span-6">
            <x-form.form-label for="address" value="Endereço"/>
            <x-form.form-input name="address" value="{{ old('address') ?? $dbEstablishment->address ?? '' }}" placeholder="Endereço" required />
            <x-form.form-error for="address" />
        </div>
        
        <div class="col-span-12 md:col-span-2">
            <x-form.form-label for="number" value="Nº"/>
            <x-form.form-input name="number" value="{{ old('number') ?? $dbEstablishment->number ?? '' }}" placeholder="123" required />
            <x-form.form-error for="number" />
        </div>
        
        <div class="col-span-12 md:col-span-4">
            <x-form.form-label for="district" value="Bairro"/>
            <x-form.form-input name="district" value="{{ old('district') ?? $dbEstablishment->district ?? '' }}" placeholder="Bairro" required />
            <x-form.form-error for="district" />
        </div>

        <div class="col-span-12 md:col-span-4">
            <x-form.form-label for="country_id" value="Pais"/>
            <x-form.form-select name="country_id" wire:model.live="selectedCountry">
                @foreach ($dbRegionCountries as $dbRegionCountry)
                    <option value="{{$dbRegionCountry->id}}" @isset($db) @if ($dbEstablishment->country_id == $dbRegionCountry->id) selected @endif @endisset >
                        {{$dbRegionCountry->title}}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="state_id" />
        </div>

        <div class="col-span-12 md:col-span-4">
            <x-form.form-label for="state_id" value="Estado"/>
            <x-form.form-select name="state_id" wire:model.live="selectedState">
                @foreach ($dbRegionStates as $dbRegionState)
                    <option value="{{$dbRegionState->id}}" @isset($db) @if ($dbEstablishment->state_id == $dbRegionState->id) selected @endif @endisset >
                        {{$dbRegionState->title}}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="state_id" />
        </div>
        
        <div class="col-span-12 md:col-span-4">
            <x-form.form-label for="city_id" value="Cidade"/>
            <x-form.form-select name="city_id" wire:model.live="selectedCity">
                @foreach ($dbRegionCities as $dbRegionCity)
                    <option value="{{$dbRegionCity->id}}" @isset($db) @if ($dbEstablishment->city_id == $dbRegionCity->id) selected @endif @endisset >
                        {{$dbRegionCity->title}}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="city_id" />
        </div>
        
        <div class="col-span-12 md:col-span-3">
            <x-form.form-label for="latitude" value="Latitude"/>
            <x-form.form-input name="latitude" value="{{ old('latitude') ?? $dbEstablishment->latitude ?? '' }}" placeholder="Latitude" required />
            <x-form.form-error for="latitude" />
        </div>
        
        <div class="col-span-12 md:col-span-3">
            <x-form.form-label for="longitude" value="Longitude"/>
            <x-form.form-input name="longitude" value="{{ old('longitude') ?? $dbEstablishment->longitude ?? '' }}" placeholder="Longitude" required />
            <x-form.form-error for="longitude" />
        </div>
        
        <div class="col-span-12 md:col-span-6">
            <x-form.form-label for="financial_block_id" value="Bloco Financeiro"/>
            <x-form.form-select name="financial_block_id">
                @foreach ($dbCompanyFinancialBlocks as $dbCompanyFinancialBlock)
                    <option value="{{$dbCompanyFinancialBlock->id}}"
                        @if (old('financial_block_id', $dbEstablishment->financial_block_id ?? null) == $dbCompanyFinancialBlock->id) 
                            selected 
                        @endif
                    >
                        {{$dbCompanyFinancialBlock->title}}
                    </option>
                @endforeach
            </x-form.form-select>
            <x-form.form-error for="financial_block_id" />
        </div>
    </x-form.form-group>
</div>
