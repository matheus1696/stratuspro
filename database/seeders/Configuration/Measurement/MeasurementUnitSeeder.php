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
        MeasurementUnit::create(['acronym'=>'UND', 'title'=>'Unidade', 'description'=>'Unidades']);
        MeasurementUnit::create(['acronym'=>'PCT', 'title'=>'Pacote', 'description'=>'Pacotes']);
        MeasurementUnit::create(['acronym'=>'PCT/10', 'title'=>'Pacote c/ 10 unidades', 'description'=>'Pacotes']);
        MeasurementUnit::create(['acronym'=>'PCT/20', 'title'=>'Pacote', 'description'=>'Pacotes']);
        MeasurementUnit::create(['acronym'=>'PCT/50', 'title'=>'Pacote', 'description'=>'Pacotes']);
        MeasurementUnit::create(['acronym'=>'PCT/100', 'title'=>'Pacote', 'description'=>'Pacotes']);
        MeasurementUnit::create(['acronym'=>'PCT/1000', 'title'=>'Pacote', 'description'=>'Pacotes']);
    }
}
