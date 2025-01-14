<x-pages.app>

    @slot('body')
        <x-header.header-group>
            <x-header.header-title title="Gerenciamento de Usuários" />
        </x-header.header-group>

        <div>
            <livewire:managenment.user.user-table />
        </div>
    @endslot

</x-pages.app>
