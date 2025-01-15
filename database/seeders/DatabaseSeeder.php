<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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
            BusinessContractStatusSeeder::class,
            BusinessContractSupplierSeeder::class,
        ]);
    }
}
