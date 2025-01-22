<?php

namespace Database\Seeders\SpatiePermissions;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserPermissionGlobalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criando roles com nomes consistentes
        $superadmin = Role::create([
            'name' => 'super_admin', 
            'display_name' => 'Super Administrador de Sistema', 
            'description' => 'Tem acesso a todos as permissões do sistema.'
        ]);

        // Atribuindo permissões ao superadmin
        $superadmin->givePermissionTo(Permission::all());
    }
}
