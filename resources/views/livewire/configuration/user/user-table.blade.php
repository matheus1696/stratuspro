<div>
    <x-table.table :paginate="$dbUsers">

        <!-- Inicio Slot Search -->
        @slot('search')
            <div class="flex justify-between gap-2 py-3">
                <div class="w-44 md:w-32">
                    <x-form.form-select wire:model.live="perPage">
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                        <option value="150">150 por página</option>
                        <option value="200">200 por página</option>
                        <option value="250">250 por página</option>
                    </x-form.form-select>
                </div>

                <div class="w-full md:w-48">
                    <!-- Filtros de Pesquisa -->
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search" placeholder="Procurar por nome ou email" />
                </div>
            </div>
        @endslot

        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th>Nome</x-table.th>
            <x-table.th>Email</x-table.th>
            <x-table.th>Data de Nascimento</x-table.th>
            <x-table.th class="w-24"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbUsers as $dbUser)
                <x-table.tr>
                    <x-table.td>{{ $dbUser->name }}</x-table.td>
                    <x-table.td>{{ $dbUser->email }}</x-table.td>
                    <x-table.td>{{ $dbUser->birth_date }}</x-table.td>
                    <x-table.td>

                        <!-- Modal Permissões -->
                        <x-modal.modal id="UserPermissionModal{{ $dbUser->id }}" title="Permissões" icon="fas fa-lock" class="bg-yellow-400">

                            <form action="{{ route('users.permission', $dbUser->id) }}" method="post">
                                @csrf @method('PUT')

                                <x-form.form-group>
                                    @foreach ($dbPermissions as $permission)
                                        <div class="col-span-6 md:col-span-4 flex items-center gap-2">
                                            <input type="checkbox" id="permission_{{ $permission->id }}_{{$dbUser->id}}"
                                                name="permissions[]" value="{{ $permission->name  }}" class="hidden peer"
                                                {{ $dbUser->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                            <label for="permission_{{ $permission->id }}_{{$dbUser->id}}"
                                                class="flex items-center justify-center w-full px-3 py-1 text-sm font-medium text-gray-700 border rounded-lg cursor-pointer peer-checked:bg-green-700 peer-checked:text-white peer-checked:border-green-700 hover:border-green-700">
                                                {{ $permission->display_name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </x-form.form-group>

                                <x-button.btn-primary value="Alterar Permissões" />
                            </form>
                        </x-modal.modal>

                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>