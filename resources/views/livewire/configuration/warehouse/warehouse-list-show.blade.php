<div>
    <x-pages.conteiner class="text-sm mb-5">        
        <div class="flex flex-col justify-center items-end gap-3">
            <a href="{{ route('warehouses.edit', $dbWarehouse->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-800 hover:text-gray-900 rounded-full shadown-lg text-xs transition-all duration-300 px-2.5 py-2 absolute">
                <i class="fas fa-pen"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-6 gap-5">
            <div><strong>Código</strong> {{$dbWarehouse->code}}</div>
            <div class="lg:col-span-3"><strong>Título:</strong> {{$dbWarehouse->title}}</div>
            <div class="lg:col-span-2"><strong>Tipo:</strong> {{$dbWarehouse->WarehouseType->title}} </div>
            <div class="lg:col-span-6"><strong>Endereço:</strong> {{$dbWarehouse->CompanyEstablishment->address}}, {{$dbWarehouse->CompanyEstablishment->number}}, {{$dbWarehouse->CompanyEstablishment->district}}, {{$dbWarehouse->CompanyEstablishment->RegionCity->title}}-{{$dbWarehouse->CompanyEstablishment->RegionState->acronym}}, {{$dbWarehouse->CompanyEstablishment->RegionCountry->title}}</div>
            <div class="lg:col-span-2"><strong>Latidude:</strong> {{$dbWarehouse->latitude}} </div>
            <div class="lg:col-span-2"><strong>Longitude:</strong> {{$dbWarehouse->longitude}} </div>
            <div class="lg:col-span-6"><strong>Unidade Vinculada:</strong> {{$dbWarehouse->CompanyEstablishment->title}} </div>
        </div>
    </x-pages.conteiner>

    <x-pages.conteiner class="mb-5">
        
        <div class="flex flex-col lg:flex-row justify-between items-center gap-2 pb-3 border-b border-gray-300">
            <h2 class="font-semibold text-lg">Permissões de Acesso</h2>
            
            <div class="w-full md:w-80">
                <!-- Filtros de Pesquisa -->
                <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Nome do Usuário sem Acesso" />
            </div>
        </div>

        <div class="flex items-start gap-2 py-3">
            <div class="w-1/2 bg-red-100 rounded-lg shadow overflow-hidden">
                <div class="h-60 w-full overflow-y-auto text-sm ">
                    @foreach ($dbUsers as $dbUser)
                        <div class="flex items-center justify-between gap-2 border-b border-red-200 hover:bg-red-200 ">
                            <span class="px-3.5">{{ $dbUser->name }}</span>
                            <a class="px-3.5 py-2 hover:text-white" href="{{ route('warehouses.permission',['warehouse_list'=>$dbWarehouse->id, 'user'=>$dbUser->id]) }}">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-1/2 bg-green-100 rounded-lg shadow overflow-hidden">
                <div class="h-60 w-full overflow-y-auto text-sm">
                    @foreach ($dbUserPermissions as $dbUserPermission)
                        <div class="flex items-center justify-between gap-2 border-b border-green-200 hover:bg-green-200">
                            <a class="px-3.5 py-2 hover:text-white" href="{{ route('warehouses.permission',['warehouse_list'=>$dbWarehouse->id, 'user'=>$dbUserPermission->user_id]) }}">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                            <span class="px-3.5 py-2">{{ $dbUserPermission->User->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </x-pages.conteiner>

    <x-pages.conteiner class="mb-5">
        Itens em estoque
    </x-pages.conteiner>

    <x-pages.conteiner class="mb-5">
        Movimentações
    </x-pages.conteiner>
</div>