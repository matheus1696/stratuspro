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
        Schema::create('configuration_financial_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('acronym');
            $table->string('title');
            $table->string('filter');
            $table->string('description')->nullable();
            $table->string('color')->nullable();
            $table->boolean('is_active')->default(TRUE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuration_financial_blocks');
    }
};
