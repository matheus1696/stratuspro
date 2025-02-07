<a 
    {{ $attributes->merge(['class' => 'min-w-40 text-center w-full px-2 py-1.5 rounded text-sm shadow-md transition ease-in-out duration-300' ]) }}
>
    {{ $value ?? 'Enviar' }}
</a>