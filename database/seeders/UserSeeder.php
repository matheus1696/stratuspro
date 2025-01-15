<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        User::factory(50)->create();

        User::create([
            'name' => 'Super Admin',
            'filter' => 'super admin',
            'email' => 'superadmin@stratuspro.com.br',
            'password' => bcrypt('superadmin'),
            'email_verified_at' => now(),
        ])->assignRole('super_admin');

        User::create([
            'name' => 'User',
            'filter' => 'user',
            'email' => 'user@stratuspro.com.br',
            'password' => bcrypt('user'),
            'email_verified_at' => now(),
        ])->assignRole('users');
    }
}
