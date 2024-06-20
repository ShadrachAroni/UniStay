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
            $table->id('property_id');
            $table->foreignId('agent_id')->constrained('users');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('photos')->nullable();
            $table->text('videos')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->enum('status', ['Approved', 'Pending', 'rejected'])->default('pending');
            $table->foreignId('category_id')->constrained('categories')->nullable()->nullable();
            $table->foreignId('property_type_id')->constrained('property_types');
            $table->enum('availability_status', ['available', 'booked', 'unavailable'])->default('available');
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
