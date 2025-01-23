<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Configuration\Company\CompanyEstablishmentSeeder;
use Database\Seeders\Configuration\Company\CompanyFinancialBlockSeeder;
use Database\Seeders\Configuration\Measurement\MeasurementUnitSeeder;
use Database\Seeders\Configuration\Region\RegionCitySeeder;
use Database\Seeders\Configuration\Region\RegionCountrySeeder;
use Database\Seeders\Configuration\Region\RegionStateSeeder;
use Database\Seeders\Configuration\User\UserGenderSeeder;
use Database\Seeders\Configuration\Warehouse\WarehouseTypeSeeder;
use Database\Seeders\SpatiePermissions\UserPermissionConfigurationSeeder;
use Database\Seeders\SpatiePermissions\UserPermissionGlobalSeeder;
use Database\Seeders\SpatiePermissions\UserPermissionManagenmentsSeeder;
use Database\Seeders\SpatiePermissions\UserPermissionUserSeeder;
use Database\Seeders\SpatiePermissions\UserPermissionWarehouseSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Configurations
            RegionCountrySeeder::class,
            RegionStateSeeder::class,
            RegionCitySeeder::class,
            UserGenderSeeder::class,
            MeasurementUnitSeeder::class,
            WarehouseTypeSeeder::class,

            // Spatie Permissions
            UserPermissionUserSeeder::class,
            UserPermissionManagenmentsSeeder::class,
            UserPermissionConfigurationSeeder::class,
            UserPermissionWarehouseSeeder::class,
            UserPermissionGlobalSeeder::class,

            // Globais
            UserSeeder::class,          
            ProfessionalOccupationSeeder::class,             
            CompanyFinancialBlockSeeder::class,
            CompanyEstablishmentSeeder::class,      
            BusinessContractStatusSeeder::class,
            BusinessContractSupplierSeeder::class,
            
        ]);
    }
}
