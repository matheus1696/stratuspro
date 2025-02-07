<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Abertura de Solicitação" />
            <div>
                <x-button.link-secondary href="{{ route('warehouse_processings.index', $warehouseStorage->id) }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.conteiner>
                <form action="{{ route('warehouse_processings.store', $warehouseStorage->id) }}" method="post">
                    @csrf
                    <livewire:warehouse.warehouse-processing.warehouse-processing-form/>
                    <x-button.btn-primary value="Abrir Solicitação" />
                </form>
            </x-pages.conteiner>
        </div>
    @endslot

</x-pages.app>
