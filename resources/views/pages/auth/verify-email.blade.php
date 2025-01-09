<x-pages.app>

    @slot('body')

        <div class="flex flex-col justify-center items-center w-full h-[600px]">
            
            <h2 class="text-2xl text-center mb-6">Quase lá</h2>
            <form method="POST" action="{{ route('verification.send') }}"
                class="w-full lg:w-1/2">
                @csrf
                <div class="space-y-4 mb-6 border-y-2 border-blue-800 bg-blue-200 px-5 py-3 rounded-lg shadow-lg">
                    <p>Para sua segurança e uma experiência completa, precisamos que você confirme seu e-mail.</p>
                    <p>Verifique sua caixa de entrada e clique no link de confirmação que enviamos.</p>
                    <p>Não encontrou o e-mail? Verifique também a pasta de spam ou lixo eletrônico. Ainda sem sorte?
                        Solicite um novo envio e cuidaremos disso!</p>
                </div>
                <div>
                    <x-button.btn-primary value="Enviar uma nova confirmar de e-mail" />
                </div>
                @if (session('status') == 'verification-link-sent')
                    <div class="mt-6 border-y-2 border-green-800 bg-green-200 px-5 py-3 rounded-lg shadow-lg">
                        <p>Enviamos um novo link de verificação para o e-mail que você cadastrou. Dá uma olhadinha na sua caixa de entrada e clique no link para ativar sua conta!</p>
                    </div>
                @endif
            </form>
        </div>

    @endslot

</x-pages.app>
