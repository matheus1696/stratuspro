<div>
    <x-pages.conteiner class="text-sm">        
        <div class="flex flex-col justify-center items-end gap-3">
            <a href="{{ route('establishments.edit', $dbEstablishment->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-800 hover:text-gray-900 rounded-full shadown-lg text-xs transition-all duration-300 px-2.5 py-2 absolute">
                <i class="fas fa-pen"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">
            <div><strong>Código</strong> {{$dbEstablishment->code}}</div>
            <div class="lg:col-span-3"><strong>Título:</strong> {{$dbEstablishment->title}}</div>
            <div class="lg:col-span-4"><strong>Apelido:</strong> {{$dbEstablishment->surname}}</div>
            <div class="lg:col-span-4"><strong>Endereço:</strong> {{$dbEstablishment->address}}, {{$dbEstablishment->number}}, {{$dbEstablishment->district}}, {{$dbEstablishment->RegionCity->title}}-{{$dbEstablishment->RegionState->acronym}}, {{$dbEstablishment->RegionCountry->title}}</div>
            <div class="lg:col-span-2"><strong>Latidude:</strong> {{$dbEstablishment->latitude}} </div>
            <div class="lg:col-span-2"><strong>Longitude:</strong> {{$dbEstablishment->longitude}} </div>
            <div class="lg:col-span-4"><strong>Bloco de Financiamento:</strong> {{$dbEstablishment->FinancialBlock->title}}</div>
        </div>
    </x-pages.conteiner>   
</div>