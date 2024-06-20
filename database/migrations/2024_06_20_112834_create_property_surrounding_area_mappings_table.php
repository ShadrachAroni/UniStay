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
        Schema::create('property_surrounding_area_mappings', function (Blueprint $table) {
            $table->foreignId('property_id')->constrained('properties');
            $table->foreignId('surrounding_area_id')->constrained('surrounding_areas');
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_surrounding_area_mappings');
    }
};
