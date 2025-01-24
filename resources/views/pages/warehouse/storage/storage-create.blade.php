<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Cadastrar Almoxarifado" />
            <div>
                <x-button.link-secondary href="{{ route('warehouse_storages.index') }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.conteiner>
                <form action="{{ route('warehouse_storages.store') }}" method="post">
                    @csrf
                    <livewire:warehouse.warehouse-storage.warehouse-storage-form />
                    <x-button.btn-primary value="Cadastrar Almoxarifado" />
                </form>
            </x-pages.conteiner>
        </div>
    @endslot

</x-pages.app>
