<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Paises" />
        </x-header.header-group>

        <div>
            <livewire:configuration.region.region-country-table />
        </div>
    @endslot

</x-pages.app>
