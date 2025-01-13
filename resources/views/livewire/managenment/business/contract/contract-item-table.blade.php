<div>
    <x-table.table :paginate="$dbContractItems">

        <!-- Inicio Slot Search -->
        @slot('search')
            <div class="flex justify-between mt-5">
                <!-- Filtros de Pesquisa -->
                <div class="w-80">
                    <x-form.form-input type="text" id="search" wire:model.live.debounce.300ms="search"
                        placeholder="Buscar pelo Item" />
                </div>

                <div class="w-40 text-xs">
                    <x-button.btn-primary type="button" wire:click="openModal" value="Cadastrar Novo Item" />
                </div>
            </div>
            
            @if ($showModal)
                <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-lg">
                        <h2 class="text-xl font-semibold mb-4">Cadastro de Novo Item</h2>
                        <form wire:submit.prevent="save">
                            <div class="col-span-12 mb-4">
                                <x-form.form-label for="title" value="Título do Item" />
                                <x-form.form-input id="title" name="title" wire:model="title"
                                    placeholder="Título do item" required />
                                <x-form.form-error for="title" />
                            </div>

                            <div class="col-span-12 mb-4">
                                <x-form.form-label for="description" value="Descrição" />
                                <x-form.form-textarea id="description" wire:model="description"
                                    placeholder="Descrição do item"></x-form.form-textarea>
                                <x-form.form-error for="description" />
                            </div>

                            <div class="col-span-12 mb-4">
                                <x-form.form-label for="unit_id" value="Unidade de Medida" />
                                <x-form.form-select id="unit_id" name="unit_id" wire:model="unit_id">
                                    @foreach ($dbUnits as $dbUnit)
                                        <option value="{{ $dbUnit->id }}">{{ $dbUnit->title }}</option>
                                    @endforeach
                                </x-form.form-select>
                                <x-form.form-error for="unit_id" />
                            </div>

                            <div class="col-span-12 mb-4">
                                <x-form.form-label for="unit_price" value="Valor Unitário R$ " />
                                <x-form.form-input type="number" step="0.01" id="unit_price" name="unit_price"
                                    wire:model="unit_price" placeholder="0,01" required />
                                <x-form.form-error for="unit_price" />
                            </div>

                            <div class="flex gap-3">
                                <x-button.btn-secondary type="button" wire:click="closeModal" value="Cancelar" />
                                <x-button.btn-primary value="Salvar" />
                            </div>
                        </form>
                    </div>
                </div>
            @endif

        @endslot

        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th class="w-80">Título</x-table.th>
            <x-table.th class="w-20">Medida</x-table.th>
            <x-table.th class="w-20">Valor Uni.</x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbContractItems as $dbContractItem)
                <x-table.tr>
                    <x-table.td>{{ $dbContractItem->title }}</x-table.td>
                    <x-table.td>{{ $dbContractItem->ConfigurationUnit->title }}</x-table.td>
                    <x-table.td>{{ $dbContractItem->unit_price }}</x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
