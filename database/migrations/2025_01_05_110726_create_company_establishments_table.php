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
        Schema::create('company_establishments', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->unique();
            $table->string('title')->unique();
            $table->string('surname')->nullable()->unique();
            $table->string('filter');
            $table->string('address');
            $table->string('number');
            $table->string('district');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('country_id');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->unsignedBigInteger('financial_block_id');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('configuration_region_cities');
            $table->foreign('state_id')->references('id')->on('configuration_region_states');
            $table->foreign('country_id')->references('id')->on('configuration_region_countries');
            $table->foreign('financial_block_id')->references('id')->on('company_financial_blocks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_establishments');
    }
};
