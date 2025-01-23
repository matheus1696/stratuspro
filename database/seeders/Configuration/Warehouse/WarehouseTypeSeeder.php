<?php

namespace Database\Seeders\Configuration\Warehouse;

use App\Models\Configuration\Warehouse\WarehouseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        WarehouseType::create([ 'title' => 'Centro de Distribuição', 'filter' => 'centro de distribuição' ]);
        WarehouseType::create([ 'title' => 'Almoxarifado Local', 'filter' => 'almoxarifado local' ]);
    }
}
