<?php

namespace Database\Seeders;

use App\Models\Business\BusinessContractStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessContractStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BusinessContractStatus::create([
            'title' => 'Vigente',
            'description' => 'Contrato em execução e dentro do prazo estabelecido.',
            'is_active' => true,
        ]);

        BusinessContractStatus::create([
            'title' => 'Vencido',
            'description' => 'Contrato expirado devido ao término do prazo sem renovação.',
            'is_active' => true,
        ]);

        BusinessContractStatus::create([
            'title' => 'Pedidos Suspenso',
            'description' => 'Contrato temporariamente interrompido por decisão administrativa.',
            'is_active' => true,
        ]);

        BusinessContractStatus::create([
            'title' => 'Rescindido',
            'description' => 'Contrato encerrado por quebra de cláusulas contratuais.',
            'is_active' => true,
        ]);

        BusinessContractStatus::create([
            'title' => 'Cadastrando',
            'description' => 'Contrato encerrado por quebra de cláusulas contratuais.',
            'is_active' => true,
            'is_default' => true,
        ]);
    }
}
