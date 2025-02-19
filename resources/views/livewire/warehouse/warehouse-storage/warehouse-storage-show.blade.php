<div>
    <x-pages.container class="text-sm mb-5 relative" open="true" title="Informação do Almoxarifado" icon="fas fa-warehouse">        
        <div class="flex justify-end mb-2 absolute right-4">
            <a href="{{ route('warehouse_storages.edit', $dbWarehouseStorage->id) }}" 
               class="bg-yellow-500 hover:bg-yellow-600 text-gray-800 hover:text-gray-900 rounded-full shadow-lg text-xs transition-all duration-300 px-3 py-2">
                <i class="fas fa-pen mr-1"></i> Editar
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-6 gap-5">
            <div class="lg:col-span-3"><strong>Código</strong> {{$dbWarehouseStorage->code}}</div>
            <div class="lg:col-span-3"><strong>Título:</strong> {{$dbWarehouseStorage->title}}</div>
            <div class="lg:col-span-3"><strong>Tipo:</strong> {{$dbWarehouseStorage->WarehouseType->title}} </div>            
            <div class="lg:col-span-3"><strong>Unidade Vinculada:</strong> {{$dbWarehouseStorage->CompanyEstablishment->title}} </div>
            <div class="lg:col-span-6">
                <strong>Endereço:</strong> 
                {{ $dbWarehouseStorage->CompanyEstablishment->address }}, 
                {{ $dbWarehouseStorage->CompanyEstablishment->number }} - 
                {{ $dbWarehouseStorage->CompanyEstablishment->district }} - 
                {{ $dbWarehouseStorage->CompanyEstablishment->RegionCity->title }} - 
                {{ $dbWarehouseStorage->CompanyEstablishment->RegionState->acronym }}, 
                {{ $dbWarehouseStorage->CompanyEstablishment->RegionCountry->title }}
            </div>
            <div class="lg:col-span-3"><strong>Latidude:</strong> {{$dbWarehouseStorage->latitude}} </div>
            <div class="lg:col-span-3"><strong>Longitude:</strong> {{$dbWarehouseStorage->longitude}} </div>
        </div>
    </x-pages.container>

    <x-pages.container class="mb-5" open="true" title="Acessos ao Almoxarifado" icon="fas fa-user-lock">
        
        <div class="flex flex-col lg:flex-row justify-between items-center gap-2 pb-3 border-b border-gray-300">
            <h2 class="font-semibold text-lg">Permissões de Acesso</h2>
            
            <div class="w-full md:w-80">
                <!-- Filtros de Pesquisa -->
                <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Nome do Usuário sem Acesso" />
            </div>
        </div>

        <div class="flex items-start gap-4 py-3">
            <!-- Usuários sem Acesso -->
            <div class="w-1/2 bg-red-100 rounded-lg shadow-md overflow-hidden">
                <h3 class="bg-red-200 text-center py-3 font-semibold">Sem Acesso</h3>
                <div class="h-60 overflow-y-auto text-sm">
                    @foreach ($dbUsers as $dbUser)
                        <div class="flex justify-between items-center px-3 py-2 hover:bg-red-200 border-b">
                            <span>{{ $dbUser->name }}</span>
                            <a href="{{ route('warehouse_storages.permission', ['warehouse_storage' => $dbWarehouseStorage->id, 'user' => $dbUser->id]) }}" 
                               class="flex justify-center items-center size-6 text-sm text-red-500 hover:text-white hover:bg-red-500 rounded-full transition">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        
            <!-- Usuários com Acesso -->
            <div class="w-1/2 bg-green-100 rounded-lg shadow-md overflow-hidden">
                <h3 class="bg-green-200 text-center py-3 font-semibold">Com Acesso</h3>
                <div class="h-60 overflow-y-auto text-sm">
                    @foreach ($dbUserPermissions as $dbUserPermission)
                        <div class="flex justify-between items-center px-3 py-2 hover:bg-green-200 border-b">
                            <a href="{{ route('warehouse_storages.revoke', ['warehouse_storage' => $dbWarehouseStorage->id, 'user' => $dbUserPermission->user_id]) }}" 
                               class="flex justify-center items-center size-6 text-sm text-green-500 hover:text-white hover:bg-green-500 rounded-full transition">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                            <span>{{ $dbUserPermission->User->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </x-pages.container>

    <x-pages.container class="mb-5" open="true" title="Estoque" icon="fas fa-apple-alt">
        <h2 class="text-lg font-semibold mb-2">Itens em Estoque</h2>
        <p class="text-gray-500">Nenhum item registrado no momento.</p>
    </x-pages.container>
    
    <x-pages.container class="mb-5" open="true" title="Movimentações" icon="fas fa-arrows-alt-h">
        <h2 class="text-lg font-semibold mb-2">Movimentações</h2>
        <p class="text-gray-500">Nenhuma movimentação registrada ainda.</p>
    </x-pages.container>
    
</div>