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
        Schema::create('warehouse_processings', function (Blueprint $table) {
            $table->id();
            $table->string('ticket');
            $table->foreignId('establishment_id')->constrained('company_establishments');
            $table->timestamps();
        });

        Schema::create('warehouse_processing_users', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Exemplo: Preparação, Separação, Envio, Recebimento
            $table->foreignId('processing_id')->constrained('warehouse_processings');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });

        Schema::create('warehouse_processing_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('processing_id')->constrained('warehouse_processings');
            $table->foreignId('product_id')->constrained('warehouse_products');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_processing_items');
        Schema::dropIfExists('warehouse_processing_users');
        Schema::dropIfExists('warehouse_processings');
    }
};

