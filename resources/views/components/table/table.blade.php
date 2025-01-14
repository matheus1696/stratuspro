<div class="mb-2">
    {{ $search ?? ""}}
</div>

<div class="overflow-x-auto shadow-md rounded-xl border border-gray-200">
    <table class="w-full bg-white table-fixed">
        <thead class="text-sm text-center bg-blue-200 border-b-2 border-blue-700 text-blue-700">
            <tr>
                {{$thead ?? ""}}
            </tr>
        </thead>

        <tbody class="text-sm text-center">
            {{$tbody ?? ""}}
        </tbody>
    </table>
</div>

@isset($paginate)    
    <div class="px-3 py-5">
        {{ $paginate->links() }}
    </div>
@endisset