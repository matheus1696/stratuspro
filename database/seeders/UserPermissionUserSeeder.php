<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserPermissionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criando permissões com nomes consistentes
        Permission::create(['name' => 'user_profile', 'display_name' => 'Perfil de Usuário']);

        // Criando role para usuários padrão do sistema
        $user = Role::create([
            'name' => 'users',
            'display_name' => 'Usuário do Sistema',
            'description' => 'Usuário com acesso limitado às funcionalidades básicas do sistema, permitindo interações e consultas de acordo com as permissões atribuídas. Ideal para colaboradores que não necessitam de privilégios administrativos.'
        ]);

        // Atribuindo permissões ao superadmin
        $user->givePermissionTo(Permission::all());
    }
}
