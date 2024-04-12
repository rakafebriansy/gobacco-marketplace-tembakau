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
        Schema::create('status_ujis', function (Blueprint $table) {
            $table->bigIncrements('id_status')->nullable(false);
            $table->enum('status_uji',['Konfirmasi','Tolak','Proses'])->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_ujis');
    }
};
