<div>
    {{ $search ?? ""}}
</div>

<div class="overflow-x-auto shadow-md rounded-xl lg:overflow-hidden">
    <table class="w-full bg-white">
        <thead class="text-sm text-center bg-blue-200 border-b-2 border-blue-800">
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