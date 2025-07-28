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
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contact_person');
            $table->string('phone');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            
            $table->string('subject');
            
            // File paths (they'll be stored in storage and paths saved in DB)
            $table->string('letter_of_intent_path');
            $table->string('company_profile_path');
            $table->string('property_details_path');
            
            // Status tracking
            $table->enum('status', ['pending', 'under_review', 'approved', 'rejected'])->default('pending');
            
            // Timestamps
            $table->timestamps();
            
            // Soft deletes
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developers');
    }
};
