<?php

namespace Database\Seeders;

use App\Models\Configuration\ConfigurationMeasurementUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationMeasurementUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ConfigurationMeasurementUnit::create(['acronym'=>'UND', 'title'=>'Unidade', 'description'=>'Unidades']);
        ConfigurationMeasurementUnit::create(['acronym'=>'PCT', 'title'=>'Pacote', 'description'=>'Pacotes']);
        ConfigurationMeasurementUnit::create(['acronym'=>'PCT/10', 'title'=>'Pacote c/ 10 unidades', 'description'=>'Pacotes']);
        ConfigurationMeasurementUnit::create(['acronym'=>'PCT/20', 'title'=>'Pacote', 'description'=>'Pacotes']);
        ConfigurationMeasurementUnit::create(['acronym'=>'PCT/50', 'title'=>'Pacote', 'description'=>'Pacotes']);
        ConfigurationMeasurementUnit::create(['acronym'=>'PCT/100', 'title'=>'Pacote', 'description'=>'Pacotes']);
        ConfigurationMeasurementUnit::create(['acronym'=>'PCT/1000', 'title'=>'Pacote', 'description'=>'Pacotes']);
    }
}
