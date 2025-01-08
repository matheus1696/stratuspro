<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserPermissionManagenmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gerenciamento
        Permission::create(['name' => 'managenment_users', 'display_name' => 'Gerenciamento de Usuários']);

        $managenments = Role::create([
            'name' => 'managenments', 
            'display_name' => 'Gerenciamento do Sistema', 
            'description' => 'Permite gerenciar módulos, informações e recursos operacionais para o funcionamento diário do sistema.'
        ]);

        // Atribuindo permissões às roles
        $managenments->givePermissionTo('managenment_users');
    }
}