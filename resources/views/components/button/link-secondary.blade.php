<a 
    {{ $attributes->merge(['class' => 'w-full px-2 py-1.5 rounded-lg bg-gray-600 hover:bg-gray-800 text-center text-sm text-white hover:text-white shadow-md transition ease-in-out duration-300' ]) }}
>
    {{ $value ?? 'Enviar' }}
</a>