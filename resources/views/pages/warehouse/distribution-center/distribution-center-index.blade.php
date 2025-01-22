<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Lista de Centros de Distribuição" />
            <div>
                <x-button.link-primary href="{{ route('distribution_centers.create') }}" value="Novo Centro" />
            </div>
        </x-header.header-group>
    
        <div>
            <livewire:warehouse.distribution-center.distribution-center-table />
        </div>

    @endslot

</x-pages.app>