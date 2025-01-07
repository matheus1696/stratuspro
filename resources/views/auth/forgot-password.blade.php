<x-pages.auth>

    @slot('body')

        <div class="flex flex-col md:flex-row overflow-hidden w-full min-h-screen">
            <!-- Esquerda: Ilustração e Mensagem -->
            <div class="md:w-4/12 bg-white p-6 md:p-10 lg:flex flex-col justify-center items-center hidden">
                <h1 class="text-blue-400 text-2xl md:text-3xl font-bold text-center mb-6">
                    Esqueceu sua senha? <br> 
                    Não se preocupe, <br> 
                    <span class="text-blue-950">
                    vamos ajudar você <br>
                    a recuperá-la!</span>
                </h1>
                @include('auth.partials.auth-illustration')
            </div>

            <!-- Direita: Formulário de Login -->
            <div class="md:w-8/12 bg-blue-500 p-10 flex flex-col justify-center items-center flex-1">

                @include('auth.partials.auth-brand')

                <div class="bg-white p-6 rounded-xl shadow-xl w-full md:w-96 mb-10">
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
                        <div>
                            <x-button.btn-primary value="Solicitar Recuperação de Senha" />
                        </div>
                    </form>
                </div>      
                
                <div class="text-sm">
                    <span class="text-gray-200">Lembrou da Senha?</span> <a href="{{ route('login') }}" class="text-white font-semibold">Acesse agora</a>
                </div> 
            </div>
        </div>
    @endslot

</x-pages.auth>
