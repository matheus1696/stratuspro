<a onclick="event.preventDefault(); if(confirm('Tem certeza de que deseja excluir este item?')) { document.getElementById('delete-form-{{ $href }}').submit(); }"
    {{ $attributes->merge(['class' => 'flex justify-center items-center size-6 md:size-7 rounded-lg text-center text-xs text-white hover:text-white shadow-md transition ease-in-out duration-300 bg-red-500 hover:bg-red-600 shadow-lg trasition-all duration-300']) }}>
    <i class="fas fa-trash"></i>
</a>

<form id="delete-form-{{ $href }}" action="{{ $href }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>