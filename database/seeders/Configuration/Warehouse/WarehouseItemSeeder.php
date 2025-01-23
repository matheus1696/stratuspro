<?php

namespace Database\Seeders\Configuration\Warehouse;

use App\Models\Configuration\Warehouse\WarehouseItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['title' => 'Detergente Neutro 500ml', 'filter' => 'detergente_neutro_500ml'],
            ['title' => 'Água Sanitária 1L', 'filter' => 'agua_sanitaria_1l'],
            ['title' => 'Sabão em Barra 200g', 'filter' => 'sabao_em_barra_200g'],
            ['title' => 'Esponja de Limpeza Multiuso', 'filter' => 'esponja_limpeza_multiuso'],
            ['title' => 'Limpador Multiuso 500ml', 'filter' => 'limpador_multiuso_500ml'],
            ['title' => 'Desinfetante Floral 2L', 'filter' => 'desinfetante_floral_2l'],
            ['title' => 'Pano de Chão 60x60cm', 'filter' => 'pano_de_chao_60x60cm'],
            ['title' => 'Luva de Limpeza', 'filter' => 'luva_de_limpeza'],
            ['title' => 'Rodo 40cm', 'filter' => 'rodo_40cm'],
            ['title' => 'Vassoura de Pelo', 'filter' => 'vassoura_pelo'],
            ['title' => 'Baldes 12L', 'filter' => 'balde_12l'],
            ['title' => 'Saco de Lixo 50L (Preto)', 'filter' => 'saco_lixo_50l_preto'],
            ['title' => 'Saco de Lixo 100L (Preto)', 'filter' => 'saco_lixo_100l_preto'],
            ['title' => 'Álcool em Gel 70% 500ml', 'filter' => 'alcool_gel_70_500ml'],
            ['title' => 'Álcool Líquido 70% 1L', 'filter' => 'alcool_liquido_70_1l'],
            ['title' => 'Lustra Móveis 200ml', 'filter' => 'lustra_moveis_200ml'],
            ['title' => 'Cloro Gel 1L', 'filter' => 'cloro_gel_1l'],
            ['title' => 'Escova de Limpeza para Banheiro', 'filter' => 'escova_limpeza_banheiro'],
            ['title' => 'Esfregão Mop', 'filter' => 'esfregao_mop'],
            ['title' => 'Detergente Lava Louças 500ml', 'filter' => 'detergente_lava_loucas_500ml'],
            ['title' => 'Limpa Vidros 500ml', 'filter' => 'limpa_vidros_500ml'],
            ['title' => 'Inseticida Spray 300ml', 'filter' => 'inseticida_spray_300ml'],
            ['title' => 'Papel Higiênico 30m', 'filter' => 'papel_higienico_30m'],
            ['title' => 'Toalha de Papel 2 Rolos', 'filter' => 'toalha_papel_2_rolos'],
            ['title' => 'Detergente Alcalino 1L', 'filter' => 'detergente_alcalino_1l'],
            ['title' => 'Sabão em Pó 1kg', 'filter' => 'sabao_po_1kg'],
            ['title' => 'Desodorizador de Ambientes 300ml', 'filter' => 'desodorizador_ambientes_300ml'],
            ['title' => 'Bucha Vegetal', 'filter' => 'bucha_vegetal'],
            ['title' => 'Tapete Sanitizante 50x40cm', 'filter' => 'tapete_sanitizante_50x40cm'],
            ['title' => 'Desentupidor de Pia', 'filter' => 'desentupidor_pia'],
        ];

        foreach ($products as $product) {
            WarehouseItem::create([
                'title' => $product['title'],
                'filter' => $product['filter'],
            ]);
        }
    }
}
