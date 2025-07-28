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
        Schema::table('users', function (Blueprint $table) {
            $table->string('realtor_id')
                  ->nullable()
                  ->unique()
                  ->after('id');
        });
        // Backfill existing records (optional)
        DB::statement("UPDATE users SET realtor_id = CONCAT('REALTOR-', LPAD(id, 6, '0')) WHERE realtor_id IS NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('realtor_id');
        });
    }
};
