<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Lista de Centros de Distribuição" />
            <div>
                <x-button.link-secondary href="{{ route('distribution_centers.index') }}" value="Voltar" />
            </div>
        </x-header.header-group>

        <div>
            <x-pages.conteiner>
                <form action="{{ route('distribution_centers.update', $dbDistributionCenter) }}" method="post">
                    @csrf @method('PUT')
                    <livewire:warehouse.distribution-center.distribution-center-form :distributionCenterId="$dbDistributionCenter"/>
                    <x-button.btn-secondary value="Alterar" />
                </form>
            </x-pages.conteiner>
        </div>
    @endslot

</x-pages.app>
