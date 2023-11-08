<?php

namespace Database\Seeders;

use App\Models\JabatanFungsional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanFungsionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JabatanFungsional::create([
            'name' => 'dosen lektor',
        ]);

        JabatanFungsional::create([
            'name' => 'dosen asisten ahli',
        ]);
        JabatanFungsional::create([
            'name' => 'Pengelola Pusat Penjaminan Mutu dan Pengembangan Pembelajaran',
        ]);
        JabatanFungsional::create([
            'name' => 'pustakawan terampil',
        ]);
        JabatanFungsional::create([
            'name' => 'pengelola situs/web',
        ]);
        JabatanFungsional::create([
            'name' => 'pengadministrasi umum',
        ]);

        JabatanFungsional::create([
            'name' => 'teknisi laboratorium',
        ]);
        JabatanFungsional::create([
            'name' => 'Analis Pengelolaan Keuangan APBN Ahli Muda',
        ]);
        JabatanFungsional::create([
            'name' => 'bendahara',
        ]);
        JabatanFungsional::create([
            'name' => 'penyusun laporan keuangan',
        ]);
        JabatanFungsional::create([
            'name' => 'pengelola keuangan',
        ]);
        JabatanFungsional::create([
            'name' => 'perencana ahli pertama',
        ]);

        JabatanFungsional::create([
            'name' => 'arsiparis terampil',
        ]);
        JabatanFungsional::create([
            'name' => 'arsiparis ahli pertama',
        ]);
        JabatanFungsional::create([
            'name' => 'Pranata Hubungan Masyarakat Ahli Pertama',
        ]);
        JabatanFungsional::create([
            'name' => 'pengelola barang milik negara',
        ]);
        JabatanFungsional::create([
            'name' => 'pengolah data',
        ]);
        JabatanFungsional::create([
            'name' => 'Analis Sumber Daya Manusia Aparatur',
        ]);
        JabatanFungsional::create([
            'name' => 'Analis Sumber Daya Manusia Aparatur Ahli Pertama',
        ]);
        JabatanFungsional::create([
            'name' => 'Pranata Komputer Ahli Pertama',
        ]);

        JabatanFungsional::create([
            'name' => 'Pranata Komputer Terampil',
        ]);
        JabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Terampil',
        ]);
        JabatanFungsional::create([
            'name' => 'Pranata Laboratorium Pendidikan Ahli Pertama',
        ]);
        JabatanFungsional::create([
            'name' => 'Pengolah Data Akademik',
        ]);
        JabatanFungsional::create([
            'name' => 'Pengolah Data Penelitian dan Pengabdian kepada Masyarakat',
        ]);
        JabatanFungsional::create([
            'name' => 'Pengadministrasi Sarana dan Prasarana',
        ]);
    }
}
