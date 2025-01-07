<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User\UserGender;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(200)->create();

        $this->call([
            ProfessionalOccupationSeeder::class,
            RegionCountrySeeder::class,
            RegionStateSeeder::class,
            RegionCitySeeder::class,
            UserPermissionSeeder::class,
            UserGenderSeeder::class,
            UserSeeder::class,
        ]);
    }
}
