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
        Permission::create(['name' => 'configuration_regions', 'display_name' => 'Configurações Regiões']);

        // Gerenciamento
        Permission::create(['name' => 'managenment_users', 'display_name' => 'Gerenciamento de Usuários']);

        // Criando roles com nomes consistentes
        $configurations = Role::create([
            'name' => 'configurations', 
            'display_name' => 'Configurações de Sistema', 
            'description' => 'Permite modificar parâmetros críticos e ajustes que afetam o funcionamento global do sistema.'
        ]);

        $managenments = Role::create([
            'name' => 'managenments', 
            'display_name' => 'Gerenciamento do Sistema', 
            'description' => 'Permite gerenciar módulos, informações e recursos operacionais para o funcionamento diário do sistema.'
        ]);

        // Atribuindo permissões às roles
        $configurations->givePermissionTo(['configuration_users', 'configuration_regions']);
        $managenments->givePermissionTo('managenment_users');
    }
}
