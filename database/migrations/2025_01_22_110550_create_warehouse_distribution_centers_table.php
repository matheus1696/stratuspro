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
        Schema::create('warehouse_distribution_centers', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('title');
            $table->unsignedInteger('establishment_id');
            $table->timestamps();

            $table->foreign('establishment_id')->references('id')->on('warehouse_distribution_centers');
        });

        Schema::create('warehouse_distribution_center_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->unsignedInteger('distribution_center_id');
            $table->timestamps();

            $table->foreign('distribution_center_id')->references('id')->on('warehouse_distribution_centers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse_distribution_centers');
    }
};
