<div>
    <x-pages.conteiner class="text-sm mb-5">        
        <div class="flex flex-col justify-center items-end gap-3">
            <a href="{{ route('warehouses.edit', $dbWarehouse->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-800 hover:text-gray-900 rounded-full shadown-lg text-xs transition-all duration-300 px-2.5 py-2 absolute">
                <i class="fas fa-pen"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-6 gap-5">
            <div><strong>Código</strong> {{$dbWarehouse->code}}</div>
            <div class="lg:col-span-5"><strong>Título:</strong> {{$dbWarehouse->title}}</div>
            <div class="lg:col-span-3"><strong>Unidade Vinculada:</strong> {{$dbWarehouse->CompanyEstablishment->title}} </div>
            <div class="lg:col-span-3"><strong>Endereço:</strong> {{$dbWarehouse->CompanyEstablishment->address}}, {{$dbWarehouse->CompanyEstablishment->number}}, {{$dbWarehouse->CompanyEstablishment->district}}, {{$dbWarehouse->CompanyEstablishment->RegionCity->title}}-{{$dbWarehouse->CompanyEstablishment->RegionState->acronym}}, {{$dbWarehouse->CompanyEstablishment->RegionCountry->title}}</div>
            <div class="lg:col-span-2"><strong>Latidude:</strong> {{$dbWarehouse->latitude}} </div>
            <div class="lg:col-span-2"><strong>Longitude:</strong> {{$dbWarehouse->longitude}} </div>
            <div class="lg:col-span-2"><strong>Tipo:</strong> {{$dbWarehouse->type}} </div>
        </div>
    </x-pages.conteiner>

    <x-pages.conteiner class="mb-5">
        Permissões
    </x-pages.conteiner>

    <x-pages.conteiner class="mb-5">
        Itens em estoque
    </x-pages.conteiner>

    <x-pages.conteiner class="mb-5">
        Movimentações
    </x-pages.conteiner>
</div>