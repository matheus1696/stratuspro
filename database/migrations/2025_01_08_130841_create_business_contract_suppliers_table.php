<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('business_contract_suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier'); // Nome do fornecedor
            $table->string('cnpj')->unique(); // CNPJ
            $table->string('nire')->nullable(); // NIRE (Número de Identificação do Registro de Empresas)
            $table->string('responsible_name')->nullable(); // Nome do responsável
            $table->string('responsible_cpf')->nullable(); // CPF do responsável
            $table->foreignId('responsible_state_id')->nullable()->constrained('region_states'); // Estado do responsável
            $table->foreignId('responsible_city_id')->nullable()->constrained('region_cities'); // Cidade do responsável
            $table->string('email')->nullable(); // Email principal
            $table->string('email_opcional')->nullable(); // Email opcional
            $table->string('phone_1')->nullable(); // Telefone principal
            $table->string('phone_2')->nullable(); // Telefone secundário
            $table->string('address_street')->nullable(); // Logradouro
            $table->string('address_number')->nullable(); // Número
            $table->string('address_neighborhood')->nullable(); // Bairro
            $table->foreignId('state_id')->nullable()->constrained('region_states'); // Estado do fornecedor
            $table->foreignId('city_id')->nullable()->constrained('region_cities'); // Cidade do fornecedor
            $table->boolean('is_active')->default(true); // Status do fornecedor
            $table->text('notes')->nullable(); // Observações gerais
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_contract_suppliers');
    }
};
