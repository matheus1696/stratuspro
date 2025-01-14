<!-- Inicio de Componentização da Página Index -->
<x-pages.app>
    @slot('body')
        <div class="flex justify-center items-center min-h-96 md:pt-20">
            <x-pages.conteiner class="w-full md:w-3/4 xl:w-2/3">
                    <h3 class="mb-3 text-lg font-semibold text-center">Dados do Profissionais</h3>

                    <form action="{{ route('profiles.updateProfessional', $dbUser->id) }}" method="post">
                        @csrf @method('PUT')

                        <x-form.form-group>
                            <div class="col-span-12">
                                <x-form.form-label for="matriculation" value="Matricula"/>
                                <x-form.form-input name="matriculation" value="{{ old('matriculation') ?? $dbUser->matriculation }}" placeholder="99.999-2" maxlength="8" minlength="6"  onkeyup="handleMatriculation(event)" required />
                                <x-form.form-error for="matriculation" />
                            </div>
                            <div class="col-span-12">                                    
                                <x-form.form-label for="establishment" value="Unidade de Lotação"/>
                                <x-form.form-input value="{{ $dbUser->CompanyEstablishment->title ?? 'Sem vínculo' }}" disabled />
                            </div>
                            <div class="col-span-12">                                    
                                <x-form.form-label for="establishmentDepartment" value="Departamento"/>
                                <x-form.form-input value="{{ $dbUser->CompanyEstablishmentDepartment->title ?? 'Sem vínculo' }}" disabled />
                            </div>
                            <div class="col-span-12">                                    
                                <x-form.form-label for="companyOccupation" value="Cargo"/>
                                <x-form.form-input value="{{ $dbUser->CompanyOccupation->title ?? 'Sem vínculo' }}" disabled />
                            </div>
                        </x-form.form-group>

                        <x-button.btn-primary value="Salvar Alteração"/>
                    </form>
            </x-pages.conteiner>
        </div>
    @endslot
</x-pages.app>