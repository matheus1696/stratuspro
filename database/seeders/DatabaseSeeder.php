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
            UserPermissionUserSeeder::class,
            UserPermissionManagenmentsSeeder::class,
            UserPermissionConfigurationSeeder::class,
            UserPermissionGlobalSeeder::class,
            UserSeeder::class,          
            ProfessionalOccupationSeeder::class,             
            CompanyFinancialBlockSeeder::class,
            CompanyEstablishmentSeeder::class,      
            BusinessContractStatusSeeder::class,
            BusinessContractSupplierSeeder::class,
            
        ]);
    }
}
