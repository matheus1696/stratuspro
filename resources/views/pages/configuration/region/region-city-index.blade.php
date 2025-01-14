<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Cidades" />
        </x-header.header-group>

        <div>
            <livewire:configuration.region.region-city-table />
        </div>
    @endslot

</x-pages.app>
