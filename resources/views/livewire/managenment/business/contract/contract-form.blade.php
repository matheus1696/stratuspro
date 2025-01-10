<div>
    <form action="{{ route('contracts.store') }}" method="post" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf

        <x-form.form-group>
            
            <div class="col-span-3">
                <x-form.form-label for="number_process_bidding" value="Nº PL"/>
                <x-form.form-input name="number_process_bidding" value="{{ old('number_process_bidding') ?? $dbContract->number_process_bidding ?? '' }}" placeholder="000-{{ now()->format('Y') }}" onkeyup="handleContract(event)" maxlength="9" minlength="8"/>
                <x-form.form-error for="number_process_bidding"/>
            </div>
    
            <div class="col-span-3">
                <x-form.form-label for="number_auction" value="Nº PL"/>
                <x-form.form-input name="number_auction" value="{{ old('number_auction') }}" placeholder="000-{{ now()->format('Y') }}" onkeyup="handleContract(event)" maxlength="9" minlength="8"/>
                <x-form.form-error for="number_auction"/>
            </div>
    
            <div class="col-span-3">
                <x-form.form-label for="number_price_registration" value="Nº RP"/>
                <x-form.form-input name="number_price_registration" value="{{ old('number_price_registration') }}" placeholder="000-{{ now()->format('Y') }}" onkeyup="handleContract(event)" maxlength="9" minlength="8"/>
                <x-form.form-error for="number_price_registration"/>
            </div>
    
            <div class="col-span-3">
                <x-form.form-label for="number_price_record_document" value="Nº Ata"/>
                <x-form.form-input name="number_price_record_document" value="{{ old('number_price_record_document') }}" placeholder="000-{{ now()->format('Y') }}" onkeyup="handleContract(event)" maxlength="9" minlength="8"/>
                <x-form.form-error for="number_price_record_document"/>
            </div>
    
            <div class="col-span-12">
                <x-form.form-label for="title" value="Título"/>
                <x-form.form-input name="title" value="{{ old('title') }}" placeholder="Título"/>
                <x-form.form-error for="title"/>
            </div>
    
            <div class="col-span-12">
                <x-form.form-label for="description" value="Descrição"/>
                <x-form.form-textarea name="description" value="{{ old('description') }}" placeholder="Descrição ou objetivo do contrato"/>
                <x-form.form-error for="description"/>
            </div>
    
            <div class="col-span-4">
                <x-form.form-label for="start_date" value="Data de Início"/>
                <x-form.form-input type="date" name="start_date" value="{{ old('start_date') }}"/>
                <x-form.form-error for="start_date"/>
            </div>
    
            <div class="col-span-4">
                <x-form.form-label for="period" value="Período" />
                <x-form.form-select id="period" name="period">
                    <option value="6">6 Meses</option>
                    <option value="12">12 Meses</option>
                    <option value="24">24 Meses</option>
                    <option value="36">36 Meses</option>
                    <option value="48">48 Meses</option>
                </x-form.form-select>
            </div>
    
            <div class="col-span-4">
                <x-form.form-label for="status_id" value="Status" />
                <x-form.form-select id="status_id" name="status_id">
                    @foreach ($dbStatuses as $dbStatus)
                        <option value="{{ $dbStatus->id }}">{{ $dbStatus->title }}</option>
                    @endforeach
                </x-form.form-select>
            </div> 
    
        </x-form.form-group>

        <x-button.btn-primary/>

    </form>
</div>
