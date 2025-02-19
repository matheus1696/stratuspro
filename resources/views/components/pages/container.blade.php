<div x-data="{ open: {{ $open ?? 'true' }} }" {{ $attributes->merge(['class' => 'bg-white border border-gray-200 px-3 py-3 rounded-lg shadow-lg']) }} >
    <!-- Cabeçalho do container -->
    <div class="flex justify-between items-center" :class="open ? 'border-b border-gray-100 pb-1.5 mb-1.5' : ''">
        <p class="font-bold uppercase pl-1 text-xs text-gray-400">
            <i class="{{ $icon ?? 'fas fa-filter' }} pr-1"></i> {{ $title ?? 'Filtros' }}:
        </p>
        <button @click="open = !open" class="size-6 flex items-center justify-center transition-transform" :class="open ? 'rotate-180' : ''">
            <i class="fas fa-chevron-down"></i>
        </button>
    </div>

    <!-- Corpo do container, que será colapsável -->
    <div x-show="open" x-collapse>
        {{$slot}}
    </div>
</div>