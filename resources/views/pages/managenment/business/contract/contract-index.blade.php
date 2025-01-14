<x-pages.app>

    @slot('body')
    
        <x-header.header-group>
            <x-header.header-title title="Gestão de Contratos - Lista de Contratos" />
            <div>
                <x-button.link-primary href="{{ route('contracts.create') }}" value="Novo Contrato" />
            </div>
        </x-header.header-group>

        <div>
            <livewire:managenment.business.contract.contract-table />
        </div>

    @endslot

</x-pages.app>