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
        Schema::create('business_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('number_process_bidding');
            $table->string('number_auction');
            $table->string('number_price_registration')->nullable();
            $table->string('number_price_record_document')->nullable();
            $table->string('title');
            $table->string('filter');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('status_id')->constrained('business_contract_statuses');
            $table->decimal('total_price', 15, 2)->nullable(); // Valor total
            $table->decimal('request_price', 15, 2)->nullable(); // Valor solicitado
            $table->decimal('balance_price', 15, 2)->nullable(); // Saldo
            $table->timestamps();
        });

        Schema::create('business_contract_has_financial_blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_id')->constrained('business_contracts');
            $table->foreignId('financial_block_id')->constrained('configuration_financial_blocks');
            $table->timestamps();
        });
        
        Schema::create('business_contract_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id');
            $table->string('change_type'); // Tipo de alteração
            $table->text('change_description'); // Descrição das alterações
            $table->timestamps();
        
            $table->foreign('contract_id')->references('id')->on('business_contracts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_contracts');        
        Schema::dropIfExists('business_contract_histories');        
        Schema::dropIfExists('business_contract_has_financial_blocks');
    }
};
