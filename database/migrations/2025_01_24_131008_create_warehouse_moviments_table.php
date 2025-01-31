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
            $table->string('invoice_number')->nullable(); // Número da Nota Fiscal
            $table->string('supplier_order_number')->nullable(); // Número da Ordem do Fornecedor
            $table->foreignId('supplier_id')->constrained('business_contract_suppliers');
            $table->foreignId('product_id')->constrained('warehouse_products');
            $table->integer('quantity');
            $table->decimal('price', 10, 2); // Valor unitário do produto
            $table->decimal('total_value', 12, 2); // Valor total do movimento
            $table->enum('movement_type', ['entrada', 'saida']); // Tipo de movimentação (Entrada ou Saída)
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('financial_block_id')->constrained('company_financial_blocks');
            $table->foreignId('warehouse_id')->constrained('warehouse_storages');
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
