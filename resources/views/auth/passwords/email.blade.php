<x-pages.auth>

    @slot('body')

        <div class="flex flex-col md:flex-row overflow-hidden w-full min-h-screen">
            <!-- Esquerda: Ilustração e Mensagem -->
            <div class="md:w-1/2 bg-white p-6 md:p-10 lg:flex flex-col justify-center items-center hidden">
                <h1 class="text-blue-400 text-2xl md:text-3xl font-bold text-center mb-6">
                    Esqueceu sua senha? <br> 
                    Não se preocupe, <br> 
                    <span class="text-blue-950">vamos ajudar você a recuperá-la!</span>
                </h1>
                <img src="asset/img/illustration/{{ rand(1,8) }}.png" alt="Ilustração" class="w-full md:w-1/4">
            </div>

            <!-- Direita: Formulário de Login -->
            <div class="md:w-1/2 bg-blue-500 p-10 flex flex-col justify-center items-center flex-1">
                <div class="bg-white p-6 rounded-xl shadow-xl w-full md:w-96">
                    <div class="text-center mb-6">
                        <div class="flex justify-center items-center text-2xl gap-2 mb-10">
                            <img src="asset/img/logo.png" alt="Logo" class="size-10">
                            <p class="font-semibold text-blue-950">{{ env('APP_NAME' )}}</p>
                        </div>
                    </div>
                    @if(session('status'))
                        <div class="w-full bg-green-300 text-green-800 p-3 mb-4 rounded" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('password.email') }}" method="post">
                        @csrf
            
                        <!-- Campo de Email -->
                        <div class="mb-4">
                            <x-form.form-label for="email" value="Email" />
                            <x-form.form-input type="email" name="email" value="{{ old('email') }}"
                                placeholder="email@example.com" required autofocus />
                            <x-form.form-error for="email" />
                        </div>
            
                        <!-- Botões -->
                        <div class="flex flex-col justify-between gap-3">

                            <x-button.btn-primary value="Solicitar Recuperação de Senha" />

                            <x-button.link-outline href="{{ route('login') }}" value="Lembrou da senha? Entre agora!" />
                            
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    @endslot

</x-pages.auth>
