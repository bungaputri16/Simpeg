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
        Schema::create('unit_kerja_has_atasan_strukturals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_kerja_id');
            $table->unsignedBigInteger('jabatan_strukturals_id');
            $table->timestamps();
            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerjas')->onDelete('cascade');
            $table->foreign('jabatan_strukturals_id')->references('id')->on('jabatan_strukturals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_kerja_has_atasan_strukturals');
    }
};
