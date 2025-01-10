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
            'title' => 'Andamento',
            'description' => 'Contrato em execução e dentro do prazo estabelecido.',
            'is_active' => true,
        ]);

        BusinessContractStatus::create([
            'title' => 'Concluído',
            'description' => 'Contrato finalizado com sucesso e todas as obrigações cumpridas.',
            'is_active' => true,
        ]);

        BusinessContractStatus::create([
            'title' => 'Vencido',
            'description' => 'Contrato expirado devido ao término do prazo sem renovação.',
            'is_active' => true,
        ]);

        BusinessContractStatus::create([
            'title' => 'Cancelado',
            'description' => 'Contrato encerrado antes do seu término oficial.',
            'is_active' => true,
        ]);

        BusinessContractStatus::create([
            'title' => 'Suspenso',
            'description' => 'Contrato temporariamente interrompido por decisão administrativa.',
            'is_active' => true,
        ]);

        BusinessContractStatus::create([
            'title' => 'Rescindido',
            'description' => 'Contrato encerrado por quebra de cláusulas contratuais.',
            'is_active' => true,
        ]);
    }
}
