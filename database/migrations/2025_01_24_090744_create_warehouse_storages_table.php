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
        Schema::create('warehouse_storages', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title');
            $table->string('filter')->nullable();
            $table->text('description')->nullable();
            $table->string('opening_hours')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('type_id')->constrained('warehouse_storage_types');
            $table->foreignId('establishment_id')->constrained('company_establishments');
            $table->timestamps();
        });

        Schema::create('warehouse_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->unsignedInteger('warehouse_id');
            $table->timestamps();

            $table->foreign('warehouse_id')->references('id')->on('warehouse_storages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_storages');
    }
};
