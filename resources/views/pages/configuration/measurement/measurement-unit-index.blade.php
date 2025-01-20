<x-pages.app>

    @slot('body')  
        <x-header.header-group>
            <x-header.header-title title="Unidades de Medidas" />
        </x-header.header-group>
    
        <div>
            <livewire:configuration.measurement.measurement-unit-table />
        </div>

    @endslot

</x-pages.app>