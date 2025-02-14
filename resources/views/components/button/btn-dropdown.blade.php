<div x-data="{ dropdown: false }" class="relative inline-block">
    <!-- Botão principal -->
    <button 
        @click="dropdown = !dropdown"
        :aria-expanded="dropdown"
        aria-haspopup="true"
        {{ $attributes->merge(['type' => 'button', 'class' => 'flex items-center justify-between w-48 px-3 py-1.5 rounded text-sm shadow-md transition ease-in-out duration-300 bg-blue-600 hover:bg-blue-800 text-white']) }}
    >
        {{ $value ?? 'Ação' }}
        <i class="fas fa-chevron-down ml-1 transition-transform duration-200" :class="dropdown ? 'rotate-180' : ''"></i>
    </button>

    <!-- Dropdown Menu -->
    <div 
        x-show="dropdown" 
        @click.outside="dropdown = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg z-50"
    >
        <ul class="py-1 text-sm text-start">
            {{ $slot }}
        </ul>
    </div>
</div>
