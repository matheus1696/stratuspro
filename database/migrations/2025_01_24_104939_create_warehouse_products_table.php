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
        Schema::create('warehouse_products', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('title')->unique();
            $table->string('filter')->unique();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(TRUE);
            $table->foreignId('category_id')->constrained('warehouse_product_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_products');
    }
};
