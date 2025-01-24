<?php

namespace Database\Seeders\Warehouse;

use App\Models\Warehouse\WarehouseStorageType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseStorageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        WarehouseStorageType::create([ 'title' => 'Centro de Distribuição', 'filter' => 'centro de distribuição' ]);
        WarehouseStorageType::create([ 'title' => 'Almoxarifado Local', 'filter' => 'almoxarifado local' ]);
    }
}
