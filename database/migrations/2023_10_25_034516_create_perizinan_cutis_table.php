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
        Schema::create('perizinan_cutis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('unit_kerja_id');
            $table->string('alasan');
            $table->string('alamat_selama_cuti');
            $table->string('no_telp_bisa_dihubungi')->nullable();
            $table->unsignedBigInteger('jenis_cuti_id');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('pertimbangan_atasan_langsung')->default('proses');
            $table->string('keputusan_pejabat_berwenang')->default('proses');
            $table->string('file_pendukung')->nullable();
            $table->string('alasan_dari_atasan')->nullable();

            $table->timestamps();

            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerjas')->onDelete('cascade');
            $table->foreign('jenis_cuti_id')->references('id')->on('jenis_cutis')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perizinan_cutis');
    }
};
