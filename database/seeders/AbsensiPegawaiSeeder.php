<?php

namespace Database\Seeders;

use App\Models\PegawaiHasAbsensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PegawaiHasAbsensi::create([
            'user_id' => 7,
            'jam_masuk' => "08:00",
            'jam_keluar' => "16:00",
            'tanggal_kehadiran' => "2023-11-07",
            'status' => 'hadir'
        ]);
        PegawaiHasAbsensi::create([
            'user_id' => 18,
            'jam_masuk' => "08:00",
            'jam_keluar' => "16:00",
            'tanggal_kehadiran' => "2023-11-07",
            'status' => 'hadir'
        ]);
    }
}
