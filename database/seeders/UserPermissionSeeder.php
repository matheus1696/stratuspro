<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criando permissões com nomes consistentes
        Permission::create(['name' => 'configuration_users', 'display_name' => 'Configurações de Sistemas - Usuários']);
        Permission::create(['name' => 'configuration_region', 'display_name' => 'Configurações de Sistemas - Regiões']);
        Permission::create(['name' => 'management_users', 'display_name' => 'Gerenciamento de Usuários']);

        // Criando roles com nomes consistentes
        $configuration = Role::create(['name' => 'configuration', 'display_name' => 'Configurações de Sistemas']);
        $management = Role::create(['name' => 'management', 'display_name' => 'Gerenciamento do Sistema']);

        // Atribuindo permissões às roles
        $configuration->givePermissionTo(['configuration_users', 'configuration_region']);
        $management->givePermissionTo('management_users');
    }
}
