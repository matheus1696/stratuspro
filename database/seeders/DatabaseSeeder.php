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
            ConfigurationFinancialBlockSeeder::class,
            ConfigurationMeasurementUnitSeeder::class,
            ProfessionalOccupationSeeder::class,
            RegionCountrySeeder::class,
            RegionStateSeeder::class,
            RegionCitySeeder::class,
            UserPermissionUserSeeder::class,
            UserPermissionManagenmentsSeeder::class,
            UserPermissionConfigurationSeeder::class,
            UserPermissionGlobalSeeder::class,
            UserGenderSeeder::class,
            UserSeeder::class,
        ]);
    }
}
