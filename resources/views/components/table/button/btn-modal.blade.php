<div x-data="{ open: false }" @keydown.escape="open = false">
    <!-- Trigger Button -->
    <button @click="open = true" {{ $attributes->merge(['class' => 'flex justify-center items-center px-2 size-6 md:size-7 rounded-lg text-center text-xs text-white hover:text-white shadow-md transition ease-in-out duration-300 bg-blue-500 hover:bg-blue-600 shadow-lg trasition-all duration-300' ]) }}>
        <i class="{{$icon ?? 'fas fa-eye'}}"></i>
    </button>

    <div class="relative z-[9999]">
        <!-- Modal Background -->
        <div x-show="open" class="fixed inset-0 bg-black bg-opacity-75 z-[9999]" @click="open = false"></div>

        <!-- Modal Content -->
        <div x-show="open" x-cloak class="fixed inset-0 flex items-center justify-center p-3 z-[9999]">
            <div class="bg-white rounded-lg shadow-lg w-full md:w-2/3">
                <!-- Modal Header -->
                <div class="flex justify-between items-center px-4 py-3 border-b">
                    <h2 class="text-lg font-semibold">{{ $title ?? 'Detalhes do Item' }}</h2>
                    <button @click="open = false" class="bg-gray-500 bg:text-gray-700 text-white text-xl font-semibold rounded-lg px-4 py-2">
                        &times;
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="p-6">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</div>
