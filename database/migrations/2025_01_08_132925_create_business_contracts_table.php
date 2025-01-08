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
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['active', 'expired', 'renewed']);
            $table->integer('total_price')->nullable();
            $table->integer('request_price')->nullable();
            $table->integer('balance_price')->nullable();
            $table->timestamps();
        });

        Schema::create('business_contract_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id');
            $table->string('change_type'); // Tipo de alteração
            $table->text('change_description'); // Descrição das alterações
            $table->timestamps();
        
            $table->foreign('contract_id')->references('id')->on('contracts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_contracts');
        
        Schema::dropIfExists('business_contract_histories');
    }
};
