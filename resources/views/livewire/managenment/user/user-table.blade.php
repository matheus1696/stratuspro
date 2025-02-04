<div>
    <x-table.table :paginate="$dbUsers">

        <!-- Inicio Slot Search -->
        @slot('search')
            <div class="flex justify-between gap-2">
                <div class="w-44 md:w-32">
                    <x-form.form-select wire:model.live="perPage">
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                        <option value="150">150 por página</option>
                        <option value="200">200 por página</option>
                        <option value="250">250 por página</option>
                    </x-form.form-select>
                </div>

                <div class="w-full md:w-60">
                    <!-- Filtros de Pesquisa -->
                    <x-form.form-input type="text" wire:model.live.debounce.300ms="search"
                        placeholder="Procurar por nome ou email" />
                </div>
            </div>
        @endslot

        <!-- Inicio Slot THead -->
        @slot('thead')
            <x-table.th>Nome</x-table.th>
            <x-table.th>Email</x-table.th>
            <x-table.th class="w-32">Data de Nasc.</x-table.th>
            <x-table.th class="w-16"></x-table.th>
        @endslot

        <!-- Inicio Slot TBody -->
        @slot('tbody')
            @foreach ($dbUsers as $dbUser)
                <x-table.tr>
                    <x-table.td>{{ $dbUser->name }}</x-table.td>
                    <x-table.td>{{ $dbUser->email }}</x-table.td>
                    <x-table.td>{{ $dbUser->birth_date }}</x-table.td>
                    <x-table.td>

                        <x-table.button.btn-group>
                            <x-table.button.btn-modal title="Alterar Permissões" icon="fas fa-lock" class="bg-yellow-400 hover:bg-yellow-600 text-gray-600 hover:text-gray-600">
                                    <form action="{{ route('users.permission', $dbUser->id) }}" method="post">
                                        @csrf @method('PUT')
        
                                        <x-form.form-group>
                                            @foreach ($dbRoles as $role)
                                                @if ($role->name != 'super_admin')
                                                <div class="col-span-12 mb-6">
                                                    <h2 class="text-lg font-semibold">{{ $role->display_name }}</h2>
                                                    <p class="text-xs text-gray-400">{{ $role->description }}</p>
                                        
                                                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 mt-4">
                                                        @foreach ($role->permissions as $permission)
                                                            <div class="flex items-center gap-2">
                                                                <input type="checkbox"
                                                                    id="permission_{{ $permission->id }}_{{ $dbUser->id }}"
                                                                    name="permissions[]" value="{{ $permission->name }}"
                                                                    class="hidden peer"
                                                                    {{ $dbUser->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                                <label for="permission_{{ $permission->id }}_{{ $dbUser->id }}"
                                                                    class="flex items-center justify-center w-full px-2 py-1 text-center text-sm font-medium text-gray-700 border rounded-lg cursor-pointer peer-checked:bg-blue-700 peer-checked:text-white peer-checked:border-blue-700 hover:border-blue-700">
                                                                    {{ $permission->display_name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        </x-form.form-group>
                                        
                                        <x-button.btn-primary value="Alterar Permissões" />
                                    </form>
                            </x-table.button.btn-modal>
                        </x-table.button.btn-group>

                    </x-table.td>
                </x-table.tr>
            @endforeach
        @endslot

    </x-table.table>
</div>
