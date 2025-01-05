<x-pages.auth>

    @slot('body')

        <div class="flex flex-col md:flex-row overflow-hidden w-full min-h-screen">
            <!-- Esquerda: Ilustração e Mensagem -->
            <div class="md:w-4/12 bg-white p-6 md:p-10 lg:flex flex-col justify-center items-center hidden">
                <h1 class="text-blue-400 text-2xl md:text-3xl font-bold text-center mb-6">
                    Tudo o que <br> 
                    você precisa, <br> 
                    <span class="text-blue-950">em um só lugar!</span>
                </h1>
                <img src="asset/img/illustration/{{ rand(1,8) }}.png" alt="Ilustração" class="w-full lg:w-60">
            </div>

            <!-- Direita: Formulário de Login -->
            <div class="md:w-8/12 bg-blue-500 p-10 flex flex-col justify-center items-center flex-1">
                <div class="bg-white p-6 rounded-xl shadow-xl w-full md:w-96">
                    <div class="text-center mb-6">
                        <div class="flex justify-center items-center text-2xl gap-2 mb-10">
                            <img src="asset/img/logo.png" alt="Logo" class="size-10">
                            <p class="font-semibold text-blue-950">{{ env('APP_NAME' )}}</p>
                        </div>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="space-y-4 mb-4">
                            <!-- Campo de Email -->
                            <div>
                                <x-form.form-label for="email" value="Email" />
                                <x-form.form-input type="email" name='email' value="{{ old('email') }}" placeholder="email@example.com" required autofocus />
                                <x-form.form-error for="email" />
                            </div>
    
                            <!-- Campo de Senha -->
                            <div>                        
                                <x-form.form-label for="password" value="Senha" />
                                <x-form.form-input type="password" name='password' placeholder="********" required />
                                <x-form.form-error for="password" />
                            </div>
    
                                <!-- Links de Recuperação -->
                            <div class="text-sm text-end">
                                <a href="{{ route('password.request') }}" class="underline text-gray-400 hover:text-blue-800">Recuperar senha</a>
                            </div>
                        </div>
    
                        <!-- Botões -->
                        <div class="flex flex-col md:flex-row justify-between gap-3">

                            <x-button.btn-primary value="Entrar" />

                            <x-button.link-outline href="{{ route('register') }}" value="Cadastre-se" />
                            
                        </div>
                    </form>
                </div>                
            </div>
        </div>

    @endslot

</x-pages.auth>
