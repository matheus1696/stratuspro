<a 
    {{ $attributes->merge(['class' => 'w-full px-2 py-1.5 rounded text-sm bg-blue-600 hover:bg-blue-800 text-white hover:text-white shadow-md transition ease-in-out duration-300' ]) }}
>
    {{ $value ?? '' }}
</a>