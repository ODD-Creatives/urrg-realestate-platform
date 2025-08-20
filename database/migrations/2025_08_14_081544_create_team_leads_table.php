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
        Schema::create('team_leads', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('post'); // e.g. "Head of Sales"
            $table->string('picture')->nullable(); // path to profile image
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_leads');
    }
};
