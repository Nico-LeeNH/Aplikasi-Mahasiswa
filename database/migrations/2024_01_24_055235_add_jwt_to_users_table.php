<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    // public function up()
    // {
    //     Schema::table('users', function (Blueprint $table) {
    //         $table->string('api_token')->nullable();
    //     });
    // }

    public function up(): void
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            $table->string('file_pengantar_tujuan')->default('default_value')->change();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
