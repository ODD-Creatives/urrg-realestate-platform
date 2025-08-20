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
        Schema::create('referral_logs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('referrer_id');
            $table->string('referrer_type');
            $table->integer('level')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // No foreign key for referrer_id/referrer_type since it's polymorphic
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referral_logs');
    }
};
