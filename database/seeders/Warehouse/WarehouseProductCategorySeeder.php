<?php

namespace Database\Seeders\Warehouse;

use App\Models\Warehouse\WarehouseProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        WarehouseProductCategory::create(['title'=>'Limpeza', 'filter'=>'limpeza']);
        WarehouseProductCategory::create(['title'=>'Papelaria', 'filter'=>'papelaria']);
        WarehouseProductCategory::create(['title'=>'Apoio', 'filter'=>'apoio']);
    }
}
