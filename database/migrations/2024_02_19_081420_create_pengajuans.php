<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->bigIncrements('id_pengajuan')->primary();
            $table->unsignedBigInteger('id')->index();
            $table->string('nama_lengkap', 255);
            $table->string('nim', 255);
            $table->string('no_wa', 255);
            $table->string('email', 255);
            $table->string('lembaga_mengajukan', 225);
            $table->string('nomor_surat_pengajuan', 225);
            $table->string('tgl_surat_pengajuan', 225);
            $table->string('perihal', 225);
            $table->enum('online_offline', ['Online', 'Offline'])->default('Online');
            $table->string('judul_penelitian', 255);
            $table->string('tgl_pelaksanaan', 255);
            $table->string('tempat_pelaksanaan', 255);
            $table->enum('kota_pelaksanaan', ['Malang', 'Batu'])->default('Malang');
            $table->string('upload_file', 255);
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
};
