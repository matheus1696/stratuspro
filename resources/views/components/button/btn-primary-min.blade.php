<button 
    {{ $attributes->merge(['type' => 'submit','class' => 'text-center w-full px-2 py-1.5 rounded text-sm shadow-md transition ease-in-out duration-300 bg-blue-600 hover:bg-blue-800 text-white hover:text-white']) }}
>
    <i class="fas {{ $value ?? 'fa-plus' }} text-sm font-semibold"></i>
</button>