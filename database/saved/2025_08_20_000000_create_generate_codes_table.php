<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerateCodesTable extends Migration
{
    public function up()
    {
        Schema::create('generate_codes', function (Blueprint $table) {
            $table->id();
            
            // Foreign key to admins table (user_id)
            $table->unsignedBigInteger('user_id');
            
            // Unique code string
            $table->string('code')->unique();
            
            // Nullable referral_code string
            $table->string('referral_code')->nullable();

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')
                  ->references('id')
                  ->on('admins')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('generate_codes');
    }
}
