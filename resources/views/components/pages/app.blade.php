@extends('adminlte::page')

@section('content')
    <div class="px-5">
        {{ $body ?? '' }}
    </div>
@endsection

@section('css')
    <!-- Configuração do Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('js')
    <!-- Scripts Próprios, Máscaras de Inputs -->
    <script src="{{asset('assets/js/maskInput.js')}}"></script>

    <!-- Scripts Proteção de envio do formulário -->
    <script>
        document.querySelectorAll('.preventSubmitBtn').forEach(function(button) {
            button.addEventListener('click', function() {
                this.disabled = true; // Desativa o botão
                this.closest('form').submit(); // Envia o formulário mais próximo manualmente
            });
        });
    </script>
@endsection