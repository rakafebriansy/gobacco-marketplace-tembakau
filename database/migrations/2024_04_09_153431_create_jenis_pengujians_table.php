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
        Schema::create('jenis_pengujians', function (Blueprint $table) {
            $table->bigIncrements('id_pengujian')->nullable(false);
            $table->string('jenis_pengujian',100)->nullable(false);
            $table->unsignedBigInteger('id_pemerintah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pengujians');
    }
};
