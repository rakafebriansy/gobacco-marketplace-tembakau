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
        Schema::create('sertifikasi_produks', function (Blueprint $table) {
            $table->bigIncrements('id_sertifikasi')->nullable(false);
            $table->unsignedBigInteger('id_kecamatan')->nullable(false);
            $table->unsignedBigInteger('id_petani')->nullable(false);
            $table->unsignedBigInteger('id_pengujian')->nullable(false);
            $table->unsignedBigInteger('id_jenis_tembakau')->nullable(false);
            $table->unsignedBigInteger('id_status')->nullable(false);
            $table->string('surat_izin_usaha',100)->nullable(false);
            $table->date('tgl_serahsampel')->nullable(false);
            $table->string('berkas_lain',100)->nullable();
            $table->string('bukti_tf',100)->nullable(false);
            $table->string('hasil_pengujian',100)->nullable(false);

            $table->foreign('id_kecamatan')->on('kecamatans')->references('id_kecamatan');
            $table->foreign('id_petani')->on('petani_tembakaus')->references('id_petani');
            $table->foreign('id_pengujian')->on('jenis_pengujians')->references('id_pengujian');
            $table->foreign('id_jenis_tembakau')->on('jenis_tembakaus')->references('id_jenis_tembakau')->onDelete('cascade');
            $table->foreign('id_status')->on('status_ujis')->references('id_status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikasi_produks');
    }
};
