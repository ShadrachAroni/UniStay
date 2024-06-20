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
        Schema::create('property_amenity_mappings', function (Blueprint $table) {
            $table->foreignId('property_id')->constrained('properties');
            $table->foreignId('amenity_id')->constrained('property_amenities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_amenity_mappings');
    }
};
