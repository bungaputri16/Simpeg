<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::create([
            'judul' => 'Bimbingan Teknis Pengelola Aplikasi 
            Kepegawaian',
            'isi' => 'Data Kepegawaian adalah data tentang keadaan 
            Pegawai Negeri Sipil (PNS) 
            Kementerian Perhubungan mencakup keadaan 
            sebelum maupun setelah diangkat menjadi 
            PNS hingga Terhitung Mulai Tanggal (TMT)
            pensiun atau diberhentikan dari PNS',
            'gambar' =>'templateberita.avif'

        ]);
        Berita::create([
            'judul' => 'Launching Sistem Infomasi SIMPEG
            Polindra',
            'isi' => 'Sinopsi berita diatas dan dapat dilihat lebih
            lengkap.',
            'gambar' =>'templateberita.avif'

        ]);
        Berita::create([
            'judul' => 'Ini adalah judul berita nya.',
            'isi' => 'Sinopsi berita diatas dan dapat dilihat lebih
            lengkap',
            'gambar' =>'templateberita.avif'
        ]);
    }
}
