<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserPermissionConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Configurações
        Permission::create(['name' => 'configuration_users', 'display_name' => 'Configurações Usuários']);
        Permission::create(['name' => 'configuration_regions', 'display_name' => 'Configurações Regiões']);

        // Criando roles com nomes consistentes
        $configurations = Role::create([
            'name' => 'configurations',
            'display_name' => 'Configurações de Sistema', 
            'description' => 'Permite modificar parâmetros críticos e ajustes que afetam o funcionamento global do sistema.'
        ]);
        
        $configurations->givePermissionTo(['configuration_users', 'configuration_regions']);
    }
}
