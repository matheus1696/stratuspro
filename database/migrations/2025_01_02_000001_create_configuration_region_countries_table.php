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
        Schema::create('configuration_region_countries', function (Blueprint $table) {
            $table->id();
            $table->string('acronym')->unique();
            $table->string('title')->unique();
            $table->string('filter');
            $table->string('title_ing')->unique();
            $table->string('filter_title_ing')->unique();
            $table->string('code_iso')->unique();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuration_region_countries');
    }
};
