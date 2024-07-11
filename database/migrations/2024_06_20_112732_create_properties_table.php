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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->constrained('users');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('policies')->nullable();
            $table->string('country');
            $table->string('city');
            $table->integer('beds_start')->nullable();
            $table->integer('beds_end')->nullable();
            $table->integer('baths')->nullable();
            $table->string('street');
            $table->string('area_name')->nullable();
            $table->decimal('price', 10, 2);
            $table->foreignId('property_type_id')->constrained('property_types')->onDelete('cascade');
            $table->enum('availability_status', ['available', 'booked', 'unavailable'])->default('available');
            $table->string('video')->nullable();
            $table->decimal('latitude', 30, 25)->nullable();
            $table->decimal('longitude', 30, 25)->nullable();
            $table->timestamp('posted_at');
            $table->timestamps();
        });

        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade');
            $table->string('filename');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
