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
        Schema::create('warehouse_moviments', function (Blueprint $table) {
            $table->id();
            $table->string('supplier')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('supplier_number')->nullable();
            $table->integer('quantity');
            $table->string('type_moviment');
            $table->foreignId('product_id')->constrained('warehouse_products');
            $table->foreignId('warehouse_id')->constrained('warehouse_storages');
            $table->foreignId('financial_block_id')->constrained('company_financial_blocks');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_moviments');
    }
};
