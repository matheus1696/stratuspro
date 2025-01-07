<?php

namespace Database\Seeders;

use App\Models\User\UserGender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UserGender::create(['title'=>'Masculino',]);

        UserGender::create(['title'=>'Feminino',]);

        UserGender::create(['title'=>'Não Definido',]);
    }
}
