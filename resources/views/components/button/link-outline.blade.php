<a 
    {{ $attributes->merge(['class' => 'w-full px-2 py-1.5 rounded text-center text-sm border border-blue-500 text-blue-900 hover:text-blue-800 hover:bg-blue-200 shadow-md transition ease-in-out duration-300 ']) }}
>
    {{ $value ?? 'Enviar' }}
</a>