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
        Permission::create(['name' => 'user', 'display_name' => 'Usuário Comum']);

        // Configurações
        Permission::create(['name' => 'configuration_users', 'display_name' => 'Configurações Usuários']);
        Permission::create(['name' => 'configuration_region', 'display_name' => 'Configurações Regiões']);

        // Gerenciamento
        Permission::create(['name' => 'management_users', 'display_name' => 'Gerenciamento de Usuários']);

        // Criando roles com nomes consistentes
        $configuration = Role::create([
            'name' => 'configuration', 
            'display_name' => 'Configurações de Sistema', 
            'description' => 'Permite modificar parâmetros críticos e ajustes que afetam o funcionamento global do sistema.'
        ]);

        $management = Role::create([
            'name' => 'management', 
            'display_name' => 'Gerenciamento do Sistema', 
            'description' => 'Permite gerenciar módulos, informações e recursos operacionais para o funcionamento diário do sistema.'
        ]);

        // Atribuindo permissões às roles
        $configuration->givePermissionTo(['configuration_users', 'configuration_region']);
        $management->givePermissionTo('management_users');
    }
}
