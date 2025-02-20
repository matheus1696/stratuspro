<!-- Inicio de Componentização da Página Index -->
<x-pages.app>
    @slot('body')
        <div class="flex justify-center items-center min-h-96 md:pt-20">
            <x-pages.conteiner class="w-full md:w-3/4 xl:w-2/3">
                <h3 class="mb-3 text-lg font-semibold text-center">Dados do Pessoais</h3>

                <x-form.form-group action="{{ route('profiles.updatePersonal', $dbUser->id) }}" method="post">
                    @csrf @method('PUT')

                    <x-form.form-group>
                        <div class="col-span-12">
                            <x-form.form-label for="name" value="Nome"/>
                            <x-form.form-input name="name" value="{{ old('name') ?? $dbUser->name }}" placeholder="Nome Completo" required />
                            <x-form.form-error for="name" />
                        </div>
                        <div class="col-span-6">                                    
                            <x-form.form-label for="birth_date" value="Data Nascimento"/>
                            <x-form.form-input type="date" name="birth_date" value="{{ old('birth_date') ?? $dbUser->birth_date }}" max="{{date('2010-01-01')}}" min="{{date('1900-01-01')}}" />
                            <x-form.form-error for="birth_date" />
                        </div>
                        <div class="col-span-6">
                            <x-form.form-label for="gender_id" value="Sexo"/>
                            <x-form.form-select name="gender_id">
                                @foreach ($dbGenders as $dbGender)
                                    <option class="hover:bg-green-600" value="{{$dbGender->id}}" @if ($dbUser->gender_id == $dbGender->id) selected @endif >
                                        {{$dbGender->title}}
                                    </option>
                                @endforeach
                            </x-form.form-select>
                            <x-form.form-error for="gender_id" />
                        </div>
                        <div class="col-span-6">                                    
                            <x-form.form-label for="cpf" value="CPF"/>
                            <x-form.form-input name="cpf" value="{{ old('cpf') ?? $dbUser->cpf }}" maxlength="14" minlength="14" placeholder="000.000.000-00" onkeyup="handleCPF(event)" />
                            <x-form.form-error for="cpf" />
                        </div>
                        <div class="col-span-6">                                    
                            <x-form.form-label for="rg" value="RG"/>
                            <x-form.form-input name="rg" value="{{ old('rg') ?? $dbUser->rg }}" maxlength="10" minlength="9" placeholder="00.000.000" onkeyup="handleRegistration(event)" />
                            <x-form.form-error for="rg" />
                        </div>
                        <div class="col-span-6">                                    
                            <x-form.form-label for="phone_1" value="Contato Principal"/>
                            <x-form.form-input name="phone_1" value="{{ old('phone_1') ?? $dbUser->phone_1 }}" maxlength="15" minlength="13" placeholder="(00)00000-0000" onkeyup="handlePhone(event)" />
                            <x-form.form-error for="phone_1" />
                        </div>
                        <div class="col-span-6">                                    
                            <x-form.form-label for="phone_2" value="Contato Principal"/>
                            <x-form.form-input name="phone_2" value="{{ old('phone_2') ?? $dbUser->phone_2 }}" maxlength="15" minlength="13" placeholder="(00)00000-0000" onkeyup="handlePhone(event)" />
                            <x-form.form-error for="phone_2" />
                        </div>
                    </x-form.form-group>

                    <x-button.btn-primary value="Salvar Alteração"/>
                </x-form.form-group>
            </x-pages.conteiner>
        </div>
    @endslot
</x-pages.app>