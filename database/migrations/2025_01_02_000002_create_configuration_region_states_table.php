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
        Schema::create('configuration_region_states', function (Blueprint $table) {
            $table->id();
            $table->string('acronym')->unique();
            $table->string('title')->unique();
            $table->string('filter');
            $table->string('code_uf')->unique();
            $table->string('code_ddd')->nullable();
            $table->foreignId('country_id')->constrained('configuration_region_countries');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuration_region_states');
    }
};
