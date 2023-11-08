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
        Schema::create('pegawai_has_absensis', function (Blueprint $table) {
        //     'user_id',
        // 'jam_masuk',
        // 'jam_keluar',
        // 'tanggal_kehadiran',
        // 'status'
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('jam_masuk');
            $table->string('jam_keluar');
            $table->date('tanggal_kehadiran');
            $table->string('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai_has_absensis');
    }
};
