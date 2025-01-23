<div>
    <x-pages.conteiner class="text-sm mb-5">        
        <div class="flex flex-col justify-center items-end gap-3">
            <a href="{{ route('stock_controls.show', $dbStockControl->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-800 hover:text-gray-900 rounded-full shadown-lg text-xs transition-all duration-300 px-2.5 py-2 absolute">
                <i class="fas fa-pen"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">
            <div><strong>Código</strong> {{$dbStockControl->code}}</div>
            <div class="lg:col-span-3"><strong>Título:</strong> {{$dbStockControl->title}}</div>
            <div class="lg:col-span-4"><strong>Unidade Vinculada:</strong> {{$dbStockControl->CompanyEstablishment->title}} </div>
            <div class="lg:col-span-4"><strong>Endereço:</strong> {{$dbStockControl->CompanyEstablishment->address}}, {{$dbStockControl->CompanyEstablishment->number}}, {{$dbStockControl->CompanyEstablishment->district}}, {{$dbStockControl->CompanyEstablishment->RegionCity->title}}-{{$dbStockControl->CompanyEstablishment->RegionState->acronym}}, {{$dbStockControl->CompanyEstablishment->RegionCountry->title}}</div>
            <div class="lg:col-span-2"><strong>Latidude:</strong> {{$dbStockControl->latitude}} </div>
            <div class="lg:col-span-2"><strong>Longitude:</strong> {{$dbStockControl->longitude}} </div>
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