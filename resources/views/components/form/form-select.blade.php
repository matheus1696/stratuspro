<select     
    @if (isset($name) && $errors->has($name))
        {{ $attributes->merge([ 'class' => 'block w-full px-2 py-1.5 outline-none text-sm rounded-md shadow-sm bg-white text-red-800 border border-red-600 ' ]) }} 
    @else
        {{ $attributes->merge([ 'class' => 'block w-full px-2 py-1.5 outline-none text-sm rounded-md shadow-sm bg-white disabled:bg-gray-300 text-gray-800 disabled:text-gray-600 border border-gray-300 focus:border-blue-500' ]) }}
    @endif
>
    <option selected disabled value="0">Selecione</option>
    {{$slot}}
</select>