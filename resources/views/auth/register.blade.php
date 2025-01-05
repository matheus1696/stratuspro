<x-pages.auth>

    @slot('body')
        <div class="flex flex-col md:flex-row overflow-hidden w-full min-h-screen">

            <!-- Esquerda: Formulário de Login -->
            <div class="md:w-1/2 bg-blue-500 p-10 flex flex-col justify-center items-center flex-1">
                <div class="bg-white p-6 rounded-xl shadow-xl w-full md:w-96">
                    <div class="text-center mb-6">
                        <div class="flex justify-center items-center text-2xl gap-2 mb-8">
                            <img src="asset/img/logo.png" alt="Logo" class="size-10">
                            <p class="font-semibold text-blue-950">{{ env('APP_NAME' )}}</p>
                        </div>
                    </div>
                    <form action="{{ route('register') }}" method="post">
                        @csrf

                        <div class="space-y-4 mb-4">
                            <!-- Campo de Nome -->
                            <div>
                                <x-form.form-label for="name" value="Nome Completo" />
                                <x-form.form-input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="Nome Completo" required autofocus />
                                <x-form.form-error for="name" />
                            </div>

                            <!-- Campo de Email -->
                            <div>
                                <x-form.form-label for="email" value="Email" />
                                <x-form.form-input type="email" name="email" value="{{ old('email') }}"
                                    placeholder="email@example.com" required />
                                <x-form.form-error for="email" />
                            </div>

                            <!-- Campo de Senha -->
                            <div>
                                <x-form.form-label for="password" value="Senha" />
                                <x-form.form-input type="password" name="password" placeholder="********" required />
                                <x-form.form-error for="password" />
                            </div>

                            <!-- Campo de Confirmar Senha -->
                            <div>
                                <x-form.form-label for="password_confirmation" value="Repita a senha" />
                                <x-form.form-input type="password" name="password_confirmation" placeholder="********"
                                    required />
                                <x-form.form-error for="password_confirmation" />
                            </div>
                        </div>

                        <!-- Botões -->
                        <div class="flex flex-col md:flex-row justify-between gap-3">

                            <x-button.btn-primary value="Cadastrar" />

                            <x-button.link-outline href="{{ route('login') }}" value="Já sou um membro" />

                        </div>
                    </form>
                </div>
            </div>

            <!-- Direita: Ilustração e Mensagem -->
            <div class="md:w-1/2 bg-white p-6 md:p-10 lg:flex flex-col justify-center items-center hidden">
                <h1 class="text-blue-400 text-2xl md:text-3xl font-bold text-center mb-6">
                    Venha fazer parte do <br>
                    time de sucesso, <br>
                    <span class="text-blue-950">junte-se ao {{ env('APP_NAME') }}</span>
                </h1>
                <img src="asset/img/illustration/{{ rand(1,8) }}.png" alt="Ilustração" class="w-full md:w-1/4">
            </div>
        </div>
    @endslot

</x-pages.auth>
