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
        Schema::create('petani_tembakaus', function (Blueprint $table) {
            $table->bigIncrements('id_petani')->nullable(false);
            $table->string('nama_petani',100)->nullable(false);
            $table->string('username_petani',100)->nullable(false)->unique();
            $table->string('pw_petani',100)->nullable(false);
            $table->string('email_petani',100)->nullable(false);
            $table->unsignedBigInteger('id_jenis_kelamin')->nullable(false);
            $table->string('alamat_petani')->nullable(false);
            $table->unsignedBigInteger('id_kecamatan')->nullable(false);
            $table->string('telp_petani',20)->nullable(false);
            $table->string('noktp_petani',20)->nullable(false)->unique();

            $table->foreign('id_jenis_kelamin')->on('jenis_kelamins')->references('id_jenis_kelamin');
            $table->foreign('id_kecamatan')->on('kecamatans')->references('id_kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petani_tembakaus');
    }
};
