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
        Schema::create('jenis_kelamins', function (Blueprint $table) {
            $table->bigIncrements('id_jenis_kelamin')->nullable(false);
            $table->enum('jenis_kelamin',['laki-laki', 'perempuan'])->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_kelamins');
    }
};
