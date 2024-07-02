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
        Schema::create('property_feature_mappings', function (Blueprint $table) {
            $table->foreignId('property_id')->constrained('properties') ->onDelete('cascade');
            $table->foreignId('property_feature_id')->constrained('property_features')  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_feature_mappings');
    }
};
