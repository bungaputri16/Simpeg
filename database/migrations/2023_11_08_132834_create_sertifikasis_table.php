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
        Schema::create('sertifikasis', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('jenis_sertifikasi');
            $table->string('bidang_studi');
            $table->string('no_regis_pendidik');
            $table->string('no_sk');
            $table->string('tahun_sertifikasi');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikasis');
    }
};
