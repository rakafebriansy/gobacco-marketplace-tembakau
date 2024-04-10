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
        Schema::create('jenis_tembakaus', function (Blueprint $table) {
            $table->bigIncrements('id_jenis_tembakau')->nullable(false);
            $table->string('jenis_tembakau',100)->nullable(false);
            $table->string('gmb_tembakau',100)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_tembakaus');
    }
};
