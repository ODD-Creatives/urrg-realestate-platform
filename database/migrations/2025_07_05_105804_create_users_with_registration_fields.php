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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // Personal Information
            $table->string('firstname');
            $table->string('lastname');
            
            // Contact Information
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('state_of_residence');
            
            // Professional Information
            $table->string('referral_code');
            $table->string('experience');
            
            // Authentication
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            
            // Timestamps
            $table->timestamps();
            
            // Indexes
            $table->index(['firstname', 'lastname']);
            $table->index('referral_code');
            $table->index('state_of_residence');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
