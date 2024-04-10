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
        Schema::create('pemerintahs', function (Blueprint $table) {
            $table->bigIncrements('id_pemerintah')->nullable(false);
            $table->string('username_pemerintah',100)->nullable(false);
            $table->string('pw_pemerintah',100)->nullable(false);
            $table->string('email_pemerintah',100)->nullable(false);
            $table->string('telp_pemerintah',20)->nullable(false);
            $table->unsignedBigInteger('id_kecamatan')->nullable(false);

            $table->foreign('id_kecamatan')->on('kecamatans')->references('id_kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemerintahs');
    }
};
