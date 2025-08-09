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
       Schema::create('realtor_sequences', function (Blueprint $table) {
            $table->id();
            $table->string('date_prefix'); // will store Ymd format (e.g., "20250731")
            $table->integer('last_sequence')->default(0);
            $table->timestamps();
            
            $table->unique('date_prefix');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realtor_sequences');
    }
};
