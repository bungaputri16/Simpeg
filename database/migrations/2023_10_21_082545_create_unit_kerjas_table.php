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
        Schema::create('unit_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('has_atasan_langsung')->default(false);
            $table->unsignedBigInteger('jabatan_berwenang_id');
            $table->unsignedBigInteger('atasan_langsung_id');
            
            $table->foreign('jabatan_berwenang_id')->references('id')->on('jabatan_strukturals')->onDelete('cascade');
            $table->foreign('atasan_langsung_id')->references('id')->on('jabatan_strukturals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_kerjas');
    }
};
