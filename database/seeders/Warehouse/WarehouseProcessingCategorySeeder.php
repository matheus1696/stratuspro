<?php

namespace Database\Seeders\Warehouse;

use App\Models\Warehouse\WarehouseProcessingCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseProcessingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        WarehouseProcessingCategory::create(['title' => 'Preparação','color' => 'bg-blue-400', 'is_default' => TRUE]);
        WarehouseProcessingCategory::create(['title' => 'Separação','color' => 'bg-yellow-400',]);
        WarehouseProcessingCategory::create(['title' => 'Rota de Entrega','color' => 'bg-teal-400',]);
        WarehouseProcessingCategory::create(['title' => 'Recebido','color' => 'bg-green-400',]);
        WarehouseProcessingCategory::create(['title' => 'Cancelado','color' => 'bg-red-400',]);
    }
}
