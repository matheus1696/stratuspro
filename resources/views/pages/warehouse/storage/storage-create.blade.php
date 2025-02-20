<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Novo Almoxarifado" />
            <div class="flex gap-2">
                <x-button.link-secondary href="{{ route('warehouse_storages.index') }}" value="Voltar à Lista" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.container open="true" title="Informação do Novo Almoxarifado" icon="fas fa-warehouse">
                <x-form.form-group action="{{ route('warehouse_storages.store') }}" method="POST">
                    @csrf
                    <livewire:warehouse.warehouse-storage.warehouse-storage-form />
                    <x-button.btn-primary value="Salvar Almoxarifado" />
                </x-form.form-group>
            </x-pages.container>
        </div>
    @endslot

</x-pages.app>
