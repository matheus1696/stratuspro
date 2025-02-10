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
        WarehouseProcessingCategory::create(['title' => 'Em Preparação','color' => 'bg-blue-300', 'is_default' => TRUE]);
        WarehouseProcessingCategory::create(['title' => 'Em Separação','color' => 'bg-yellow-300',]);
        WarehouseProcessingCategory::create(['title' => 'Rota de Entrega','color' => 'bg-teal-300',]);
        WarehouseProcessingCategory::create(['title' => 'Entregue','color' => 'bg-green-300',]);
        WarehouseProcessingCategory::create(['title' => 'Cancelado','color' => 'bg-red-300',]);
    }
}
