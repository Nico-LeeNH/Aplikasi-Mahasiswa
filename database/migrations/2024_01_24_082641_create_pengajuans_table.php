<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->foreignId('id');
            $table->string('nama');
            $table->string('nim');
            $table->string('progam_studi');
            $table->string('judul_penelitian');
            $table->string('tangga_pelaksanaan');
            $table->string('tujuan_tempat_pelaksanaan');
            $table->string('nomor');
            $table->string('email');
            $table->string('upload_file');
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuans');
    }
}
