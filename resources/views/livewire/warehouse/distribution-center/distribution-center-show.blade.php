<div>
    <x-pages.conteiner class="text-sm mb-5">        
        <div class="flex flex-col justify-center items-end gap-3">
            <a href="{{ route('distribution_centers.edit', $dbDistributionCenter->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-800 hover:text-gray-900 rounded-full shadown-lg text-xs transition-all duration-300 px-2.5 py-2 absolute">
                <i class="fas fa-pen"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">
            <div><strong>Código</strong> {{$dbDistributionCenter->code}}</div>
            <div class="lg:col-span-3"><strong>Título:</strong> {{$dbDistributionCenter->title}}</div>
            <div class="lg:col-span-4"><strong>Unidade Vinculada:</strong> {{$dbDistributionCenter->CompanyEstablishment->title}} </div>
            <div class="lg:col-span-4"><strong>Endereço:</strong> {{$dbDistributionCenter->CompanyEstablishment->address}}, {{$dbDistributionCenter->CompanyEstablishment->number}}, {{$dbDistributionCenter->CompanyEstablishment->district}}, {{$dbDistributionCenter->CompanyEstablishment->RegionCity->title}}-{{$dbDistributionCenter->CompanyEstablishment->RegionState->acronym}}, {{$dbDistributionCenter->CompanyEstablishment->RegionCountry->title}}</div>
            <div class="lg:col-span-2"><strong>Latidude:</strong> {{$dbDistributionCenter->latitude}} </div>
            <div class="lg:col-span-2"><strong>Longitude:</strong> {{$dbDistributionCenter->longitude}} </div>
        </div>
    </x-pages.conteiner>

    <x-pages.conteiner class="mb-5">
        Itens em estoque
    </x-pages.conteiner>

    <x-pages.conteiner class="mb-5">
        Movimentações
    </x-pages.conteiner>
</div>