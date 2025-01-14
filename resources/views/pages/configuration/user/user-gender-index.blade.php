<x-pages.app>

    @slot('body')  
        <x-header.header-group>
            <x-header.header-title title="Gêneros" />
        </x-header.header-group>
    
        <div>
            <livewire:configuration.user.user-gender-table />
        </div>

    @endslot

</x-pages.app>