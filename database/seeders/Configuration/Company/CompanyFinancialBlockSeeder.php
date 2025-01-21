<?php

namespace Database\Seeders\Configuration\Company;

use App\Models\Configuration\Company\CompanyFinancialBlock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyFinancialBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CompanyFinancialBlock::create([
            'code' => 'adm',
            'acronym' => 'ADM',
            'title' => 'Administração',
            'filter'=>'administração',
            'description' => 'Setor responsável pelas atividades administrativas e gestão geral.',
            'color' => '#1F2937',
            'is_active' => true
        ]);

        CompanyFinancialBlock::create([
            'code' => 'atb',
            'acronym' => 'ATB',
            'title' => 'Atenção Básica',
            'filter' => 'atenção básica',
            'description' => 'Setor dedicado aos serviços de atenção básica à saúde.',
            'color' => '#3B82F6',
            'is_active' => true
        ]);

        CompanyFinancialBlock::create([
            'code' => 'mac',
            'acronym' => 'MAC',
            'title' => 'Média e Alta Especialidade',
            'filter' => 'média e alta especialidade',
            'description' => 'Setor voltado para serviços médicos de média e alta complexidade.',
            'color' => '#10B981',
            'is_active' => true
        ]);

        CompanyFinancialBlock::create([
            'code' => 'vsan',
            'acronym' => 'V. SAN',
            'title' => 'Vigilância Sanitária',
            'filter' => 'Vigilância Sanitária',
            'description' => 'Setor responsável pelo controle sanitário de produtos e serviços.',
            'color' => '#F59E0B',
            'is_active' => true
        ]);

        CompanyFinancialBlock::create([
            'code' => 'vepd',
            'acronym' => 'V. EPD',
            'title' => 'Vigilância Epidemiológica',
            'filter' => 'vigilância epidemiológica',
            'description' => 'Setor encarregado da vigilância de doenças e monitoramento epidemiológico.',
            'color' => '#EF4444',
            'is_active' => true
        ]);
    }
}
