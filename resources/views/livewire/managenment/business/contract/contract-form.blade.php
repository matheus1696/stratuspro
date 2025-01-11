<div>
    <x-form.form-group>

        <div class="col-span-3">
            <x-form.form-label for="number_process_bidding" value="Nº PL"/>
            <x-form.form-input name="number_process_bidding" value="{{ old('number_process_bidding') ?? $dbContract->number_process_bidding ?? '' }}" placeholder="000-{{ now()->format('Y') }}" onkeyup="handleContract(event)" maxlength="9" minlength="8" required/>
            <x-form.form-error for="number_process_bidding"/>
        </div>
    
        <div class="col-span-3">
            <x-form.form-label for="number_auction" value="Nº PL"/>
            <x-form.form-input name="number_auction" value="{{ old('number_auction') ?? $dbContract->number_auction ?? '' }}" placeholder="000-{{ now()->format('Y') }}" onkeyup="handleContract(event)" maxlength="9" minlength="8" required/>
            <x-form.form-error for="number_auction"/>
        </div>
    
        <div class="col-span-3">
            <x-form.form-label for="number_price_registration" value="Nº RP"/>
            <x-form.form-input name="number_price_registration" value="{{ old('number_price_registration') ?? $dbContract->number_price_registration ?? '' }}" placeholder="000-{{ now()->format('Y') }}" onkeyup="handleContract(event)" maxlength="9" minlength="8" required/>
            <x-form.form-error for="number_price_registration"/>
        </div>
    
        <div class="col-span-3">
            <x-form.form-label for="number_price_record_document" value="Nº Ata"/>
            <x-form.form-input name="number_price_record_document" value="{{ old('number_price_record_document') ?? $dbContract->number_price_record_document ?? '' }}" placeholder="000-{{ now()->format('Y') }}" onkeyup="handleContract(event)" maxlength="9" minlength="8" required/>
            <x-form.form-error for="number_price_record_document"/>
        </div>
    
        <div class="col-span-12">
            <x-form.form-label for="title" value="Título"/>
            <x-form.form-input name="title" value="{{ old('title') ?? $dbContract->title ?? '' }}" placeholder="Título"/>
            <x-form.form-error for="title" required/>
        </div>
    
        <div class="col-span-12">
            <x-form.form-label for="description" value="Descrição"/>
            <x-form.form-textarea name="description" placeholder="Descrição ou objetivo do contrato">
                {{ old('description') ?? $dbContract->description ?? '' }}
            </x-form.form-textarea>
            <x-form.form-error for="description" required/>
        </div>
    
        <div class="col-span-4">
            <x-form.form-label for="start_date" value="Data de Início"/>
            <x-form.form-input type="date" name="start_date" value="{{ old('start_date') ?? $dbContract->start_date ?? '' }}"/>
            <x-form.form-error for="start_date" required/>
        </div>
    
        <div class="col-span-4">
            <x-form.form-label for="period" value="Período"/>
            <x-form.form-select id="period" name="period">
                <option value="6" {{ (old('period') ?? $dbContract->period ?? '') == '6' ? 'selected' : '' }}>6 Meses</option>
                <option value="12" {{ (old('period') ?? $dbContract->period ?? '') == '12' ? 'selected' : 'selected' }}>12 Meses</option>
                <option value="24" {{ (old('period') ?? $dbContract->period ?? '') == '24' ? 'selected' : '' }}>24 Meses</option>
                <option value="36" {{ (old('period') ?? $dbContract->period ?? '') == '36' ? 'selected' : '' }}>36 Meses</option>
                <option value="48" {{ (old('period') ?? $dbContract->period ?? '') == '48' ? 'selected' : '' }}>48 Meses</option>
            </x-form.form-select>
        </div>
    
        <div class="col-span-4">
            <x-form.form-label for="status_id" value="Status"/>
            <x-form.form-select id="status_id" name="status_id">
                @foreach ($dbStatuses as $dbStatus)
                    @if (isset($dbContract))                                                      
                        <option value="{{ $dbStatus->id }}" {{ (old('status_id') ?? $dbContract->status_id ?? '') == $dbStatus->id ? 'selected' : '' }}>{{ $dbStatus->title }}</option>
                    @else
                        @if ($dbStatus->title === 'Vigente')                            
                            <option value="{{ $dbStatus->id }}" selected>{{ $dbStatus->title }}</option>
                        @endif
                    @endif
                @endforeach
            </x-form.form-select>
        </div>
    
    </x-form.form-group>
</div>
