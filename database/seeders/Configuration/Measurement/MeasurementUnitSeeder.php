<?php

namespace Database\Seeders\Configuration\Measurement;

use App\Models\Configuration\Measurement\MeasurementUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasurementUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        MeasurementUnit::create(['acronym'=>'UND', 'title'=>'Unidade', 'filter'=>'unidade', 'description'=>'Unidades']);
        MeasurementUnit::create(['acronym'=>'PCT', 'title'=>'Pacote', 'filter'=>'pacote', 'description'=>'Pacotes']);
        MeasurementUnit::create(['acronym'=>'PCT/10', 'title'=>'Pacote c/ 10 unidades', 'filter'=>'pacote', 'description'=>'Pacotes']);
        MeasurementUnit::create(['acronym'=>'PCT/20', 'title'=>'Pacote c/ 20 unidades', 'filter'=>'pacote', 'description'=>'Pacotes']);
        MeasurementUnit::create(['acronym'=>'PCT/50', 'title'=>'Pacote c/ 50 unidades', 'filter'=>'pacote', 'description'=>'Pacotes']);
        MeasurementUnit::create(['acronym'=>'PCT/100', 'title'=>'Pacote c/ 100 unidades', 'filter'=>'pacote', 'description'=>'Pacotes']);
        MeasurementUnit::create(['acronym'=>'PCT/1000', 'title'=>'Pacote c/ 1000 unidades', 'filter'=>'pacote', 'description'=>'Pacotes']);

    }
}
