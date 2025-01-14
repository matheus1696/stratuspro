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
        Schema::create('business_contract_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('filter');
            $table->text('description');
            $table->foreignId('unit_id')->constrained('configuration_measurement_units');
            $table->integer('quantity_adm')->nullable();
            $table->integer('quantity_atb')->nullable();
            $table->integer('quantity_mac')->nullable();
            $table->integer('quantity_vepd')->nullable();
            $table->integer('quantity_vsan')->nullable();
            $table->integer('request_adm')->nullable();
            $table->integer('request_atb')->nullable();
            $table->integer('request_mac')->nullable();
            $table->integer('request_vepd')->nullable();
            $table->integer('request_vsan')->nullable();
            $table->decimal('unit_price', 15, 2);
            $table->unsignedBigInteger('contract_id');
            $table->timestamps();

            $table->foreign('contract_id')->references('id')->on('business_contracts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_contract_items');
        Schema::dropIfExists('business_contract_item_has_financial_blocks');
    }
};
