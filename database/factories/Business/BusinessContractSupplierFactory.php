<?php

namespace Database\Factories\Business;

use App\Models\Region\RegionCity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business\BusinessContractSupplier>
 */
class BusinessContractSupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Criação das instâncias de estado e cidade
        $city = RegionCity::inRandomOrder()->first(); // Pega uma cidade aleatória

        return [
            'supplier' => fake()->company(), // Nome do fornecedor
            'cnpj' => fake()->numerify('##.###.###/####-##'), // CNPJ
            'nire' => fake()->numerify('###########'), // NIRE
            'responsible_name' => fake()->name(), // Nome do responsável
            'responsible_cpf' => fake()->numerify('###.###.###-##'), // CPF do responsável
            'responsible_state_id' => $city->state_id, // ID do estado do responsável
            'responsible_city_id' => $city->id, // ID da cidade do responsável
            'email' => fake()->email(), // Email principal
            'email_opcional' => fake()->email(), // Email opcional
            'phone_1' => fake()->phone(), // Telefone principal
            'phone_2' => fake()->phone(), // Telefone secundário
            'address_street' => fake()->name(), // Logradouro
            'address_number' => fake()->randomNumber(5, false), // Número
            'address_neighborhood' => fake()->word(), // Bairro
            'state_id' => $city->state_id, // ID do estado do fornecedor
            'city_id' => $city->id, // ID da cidade do fornecedor
            'is_active' => fake()->boolean(), // Status do fornecedor
            'notes' => fake()->paragraph(), // Observações
        ];
    }
}
