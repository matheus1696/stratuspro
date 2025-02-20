<button :disabled="isSubmitting" :class="{ 'opacity-50 cursor-not-allowed': isSubmitting }"
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'min-w-48 text-center w-full px-2 py-1.5 mt-4 mb-2 rounded text-sm shadow-md transition ease-in-out duration-300 bg-gray-600 hover:bg-gray-800 text-white hover:text-white'
    ]) }}>
    <span x-show="!isSubmitting">{{ $value ?? 'Enviar' }}</span>
    <span x-show="isSubmitting">Enviando...</span>
</button>
