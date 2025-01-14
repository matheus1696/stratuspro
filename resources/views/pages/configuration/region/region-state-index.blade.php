<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Estados" />
        </x-header.header-group>

        <div>
            <livewire:configuration.region.region-state-table />
        </div>
    @endslot

</x-pages.app>
