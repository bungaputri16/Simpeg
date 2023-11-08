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
        // 'user_id',
        // '',
        // '',
        // '',
        // '',
        // '',
        // 'tanggal_kelulusan',
        // 'nim',
        // 'jumlah_semester_tempuh',
        // 'jumlah_kelulusan',
        // 'jumlah_sks_kelulusan',
        // 'ipk_kelulusan',
        // 'nomor_sk_penyetaraan',
        // 'tanggal_sk_penyetaraan',
        // 'nomor_ijazah',
        // 'judul_tesis',
        // 'file_pendukung',
        Schema::create('pendidikan_formals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_perguruan_tinggi');
            $table->string('program_studi');
            // $table->string('gelar_akademik');
            // $table->string('bidang_studi');
            // $table->unsignedSmallInteger('tahun_masuk');
            // $table->unsignedSmallInteger('tahun_lulus');
            // $table->date('tanggal_kelulusan');
            // $table->string('nim')->nullable();
            // $table->unsignedSmallInteger('jumlah_semester_tempuh')->nullable();
            // $table->unsignedSmallInteger('jumlah_sks_kelulusan');
            // $table->float('ipk_kelulusan');
            // $table->string('nomor_sk_penyetaraan')->nullable();
            // $table->date('tanggal_sk_penyetaraan')->nullable();
            // $table->unsignedInteger('nomor_ijazah')->nullable();
            // $table->string('judul_tesis')->nullable();

            // $table->string('file_pendukung')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan_formals');
    }
};
