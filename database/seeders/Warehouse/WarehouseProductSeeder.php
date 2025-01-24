<?php

namespace Database\Seeders\Warehouse;

use App\Models\Warehouse\WarehouseProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            // Categoria 1 - Limpeza
            ['title' => 'Água Sanitária', 'filter' => 'agua-sanitaria', 'category_id' => 1, 'barcode' => '100000000001'],
            ['title' => 'Detergente Neutro', 'filter' => 'detergente-neutro', 'category_id' => 1, 'barcode' => '100000000002'],
            ['title' => 'Sabão em Pó', 'filter' => 'sabao-em-po', 'category_id' => 1, 'barcode' => '100000000003'],
            ['title' => 'Desinfetante Lavanda', 'filter' => 'desinfetante-lavanda', 'category_id' => 1, 'barcode' => '100000000004'],
            ['title' => 'Pano de Chão', 'filter' => 'pano-de-chao', 'category_id' => 1, 'barcode' => '100000000005'],
            ['title' => 'Vassoura de Palha', 'filter' => 'vassoura-de-palha', 'category_id' => 1, 'barcode' => '100000000006'],
            ['title' => 'Esponja Multiuso', 'filter' => 'esponja-multiuso', 'category_id' => 1, 'barcode' => '100000000007'],
            ['title' => 'Lustra-Móveis', 'filter' => 'lustra-moveis', 'category_id' => 1, 'barcode' => '100000000008'],
            ['title' => 'Álcool 70%', 'filter' => 'alcool-70', 'category_id' => 1, 'barcode' => '100000000009'],
            ['title' => 'Limpa Vidros', 'filter' => 'limpa-vidros', 'category_id' => 1, 'barcode' => '100000000010'],
            // Adicione mais produtos aqui...

            // Categoria 2 - Papelaria
            ['title' => 'Caderno Universitário', 'filter' => 'caderno-universitario', 'category_id' => 2, 'barcode' => '200000000001'],
            ['title' => 'Caneta Azul', 'filter' => 'caneta-azul', 'category_id' => 2, 'barcode' => '200000000002'],
            ['title' => 'Caneta Vermelha', 'filter' => 'caneta-vermelha', 'category_id' => 2, 'barcode' => '200000000003'],
            ['title' => 'Caneta Preta', 'filter' => 'caneta-preta', 'category_id' => 2, 'barcode' => '200000000004'],
            ['title' => 'Lápis HB', 'filter' => 'lapis-hb', 'category_id' => 2, 'barcode' => '200000000005'],
            ['title' => 'Apontador', 'filter' => 'apontador', 'category_id' => 2, 'barcode' => '200000000006'],
            ['title' => 'Borracha', 'filter' => 'borracha', 'category_id' => 2, 'barcode' => '200000000007'],
            ['title' => 'Tesoura Escolar', 'filter' => 'tesoura-escolar', 'category_id' => 2, 'barcode' => '200000000008'],
            ['title' => 'Cola Branca 200ml', 'filter' => 'cola-branca-200ml', 'category_id' => 2, 'barcode' => '200000000009'],
            ['title' => 'Fichário A4', 'filter' => 'fichario-a4', 'category_id' => 2, 'barcode' => '200000000010'],
            // Adicione mais produtos aqui...

            // Categoria 3 - Apoio
            ['title' => 'Carrinho de Transporte', 'filter' => 'carrinho-transporte', 'category_id' => 3, 'barcode' => '300000000001'],
            ['title' => 'Caixa Organizadora', 'filter' => 'caixa-organizadora', 'category_id' => 3, 'barcode' => '300000000002'],
            ['title' => 'Luvas de Látex', 'filter' => 'luvas-latex', 'category_id' => 3, 'barcode' => '300000000003'],
            ['title' => 'Luvas Nitrílicas', 'filter' => 'luvas-nitrilicas', 'category_id' => 3, 'barcode' => '300000000004'],
            ['title' => 'Máscara de Proteção', 'filter' => 'mascara-protecao', 'category_id' => 3, 'barcode' => '300000000005'],
            ['title' => 'Fita Adesiva Transparente', 'filter' => 'fita-adesiva-transparente', 'category_id' => 3, 'barcode' => '300000000006'],
            ['title' => 'Fita Adesiva Marrom', 'filter' => 'fita-adesiva-marrom', 'category_id' => 3, 'barcode' => '300000000007'],
            ['title' => 'Plástico Bolha', 'filter' => 'plastico-bolha', 'category_id' => 3, 'barcode' => '300000000008'],
            ['title' => 'Etiqueta Adesiva', 'filter' => 'etiqueta-adesiva', 'category_id' => 3, 'barcode' => '300000000009'],
            ['title' => 'Cavalete de Aviso', 'filter' => 'cavalete-aviso', 'category_id' => 3, 'barcode' => '300000000010'],
            // Adicione mais produtos aqui...
        ];

        foreach ($products as $product) {
            WarehouseProduct::create($product);
        }
    }
}
