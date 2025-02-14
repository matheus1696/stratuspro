<li>
    <a {{ $attributes->merge(['class' => 'flex items-center gap-2 block px-4 py-2 hover:bg-gray-100']) }} >
        @isset ($icon)
            <i class="{{$icon}}"></i>
        @endisset
        {{ $value ?? 'Opção 1' }}
    </a>
</li>
