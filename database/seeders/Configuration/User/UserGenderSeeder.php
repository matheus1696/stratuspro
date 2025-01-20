<?php

namespace Database\Seeders\Configuration\User;

use App\Models\Configuration\User\UserGender;
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
        UserGender::create(['title' => 'Masculino', 'filter' => 'masculino']);

        UserGender::create(['title' => 'Feminino', 'filter' => 'feminino']);

        UserGender::create(['title' => 'Não Definido', 'filter' => 'não definido']);
    }
}
