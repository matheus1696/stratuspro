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
            $table->decimal('unit_price', 15, 2);
            $table->unsignedBigInteger('contract_id');
            $table->timestamps();

            $table->foreign('contract_id')->references('id')->on('business_contracts');
        });

        Schema::create('business_contract_item_has_financial_blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_item_id')->constrained('business_contract_items');
            $table->foreignId('financial_block_id')->constrained('configuration_financial_blocks');
            $table->integer('quantity');
            $table->timestamps();
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
