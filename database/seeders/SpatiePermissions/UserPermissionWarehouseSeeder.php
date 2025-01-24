<?php

namespace Database\Seeders\SpatiePermissions;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserPermissionWarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void 
    {
        // Configurações
        Permission::create(['name' => 'warehouse_storages_configuration', 'display_name' => 'Configurações dos Almoxarifados']);

        // Criando roles com nomes consistentes
        $warehouse = Role::create([
            'name' => 'warehouse',
            'display_name' => 'Almoxarifado Geral',
            'description' => 'Permite modificar parâmetros e movimentações do almoxarifado.'
        ]);
        
        $warehouse->givePermissionTo([
            'warehouse_storages_configuration',
        ]);
    }
}
