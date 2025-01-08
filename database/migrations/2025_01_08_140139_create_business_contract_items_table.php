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
            $table->text('description');
            $table->string('unit');
            $table->string('quantity');
            $table->string('unit_price');
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
    }
};
