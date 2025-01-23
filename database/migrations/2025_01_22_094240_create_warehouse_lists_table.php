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
        Schema::create('warehouse_lists', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title')->unique();
            $table->string('filter');
            $table->string('is_active')->default(TRUE);
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('establishment_id');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('warehouse_types');
            $table->foreign('establishment_id')->references('id')->on('company_establishments');
        });

        Schema::create('warehouse_list_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->unsignedInteger('warehouse_id');
            $table->timestamps();

            $table->foreign('warehouse_id')->references('id')->on('warehouse_lists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_list_permissions');
        Schema::dropIfExists('warehouse_lists');
    }
};
