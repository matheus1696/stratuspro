<button 
    {{ $attributes->merge(['type' => 'submit','class' => 'w-full px-2 py-1.5 rounded text-sm bg-blue-600 text-white hover:bg-blue-800 shadow-md transition ease-in-out duration-300 ' . (config('adminlte.class_btn_primary') ?? '') ]) }}
>
    {{ $value ?? 'Enviar' }}
</button>