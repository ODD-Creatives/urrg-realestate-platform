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

            // Foreign key to developers table
            $table->unsignedBigInteger('developer_id');
            $table->string('property_code')->unique(); // e.g. PROP040825001

            // Property details
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('location');
            $table->decimal('price', 15, 2);

            // Category and status
            $table->enum('category', ['house', 'land', 'apartment'])->default('house');
            $table->enum('status', ['pending', 'approved', 'rejected', 'sold'])->default('pending');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_verified')->default(false);

            // Optional features
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('toilets')->nullable();
            $table->string('size')->nullable(); // e.g. 450sqm

            // Images (up to 5)
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('developer_id')->references('id')->on('developers')->onDelete('cascade');
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
