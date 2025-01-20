<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Configuration\Measurement\MeasurementUnitSeeder;
use Database\Seeders\Configuration\Region\RegionCitySeeder;
use Database\Seeders\Configuration\Region\RegionCountrySeeder;
use Database\Seeders\Configuration\Region\RegionStateSeeder;
use Database\Seeders\Configuration\User\UserGenderSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RegionCountrySeeder::class,
            RegionStateSeeder::class,
            RegionCitySeeder::class,            
            UserGenderSeeder::class,            
            MeasurementUnitSeeder::class,
            ConfigurationFinancialBlockSeeder::class,
            ProfessionalOccupationSeeder::class,
            CompanyEstablishmentSeeder::class,
            UserPermissionUserSeeder::class,
            UserPermissionManagenmentsSeeder::class,
            UserPermissionConfigurationSeeder::class,
            UserPermissionGlobalSeeder::class,
            UserSeeder::class,
            BusinessContractStatusSeeder::class,
            BusinessContractSupplierSeeder::class,
            
        ]);
    }
}
