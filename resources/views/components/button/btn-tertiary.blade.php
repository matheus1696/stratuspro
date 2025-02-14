<button 
    {{ $attributes->merge(['type' => 'submit','class' => 'min-w-48 text-center w-full px-2 py-1.5 mt-4 mb-2 rounded text-sm shadow-md transition ease-in-out duration-300']) }}
>
    {{ $value ?? 'Enviar' }}
</button>