<?php

namespace Database\Seeders;

use App\Models\JabatanStruktural;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanStrukturalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JabatanStruktural::create([
            'name' => 'direktur'
        ]);
        JabatanStruktural::create([
            'name' => 'wadir 1',
            'is_wewenang' => true
        ]);
        JabatanStruktural::create([
            'name' => 'wadir 2',
            'is_wewenang' => true
        ]);
        JabatanStruktural::create([
            'name' => 'wadir 3',
            'is_wewenang' => true
        ]);

        // JabatanStruktural::create([
        //     'name' => 'ketua jurusan kesehatan'
        // ]);
        // JabatanStruktural::create([
        //     'name' => 'ketua jurusan teknik'
        // ]);
        // JabatanStruktural::create([
        //     'name' => 'ketua jurusan teknik informatika'
        // ]);
        
        // JabatanStruktural::create([
        //     'name' => 'kepala pusat penelitian dan pengabdian kepada masyarakat'
        // ]);
        // JabatanStruktural::create([
        //     'name' => 'kepala pusat penjaminan mutu dan pengembangan pembelajaran'
        // ]);
        // JabatanStruktural::create([
        //     'name' => 'kepala upa perpustakaan'
        // ]);
        // JabatanStruktural::create([
        //     'name' => 'kepala upa teknologi informasi dan komunikasi'
        // ]);
        // JabatanStruktural::create([
        //     'name' => 'kepala upa bahasa'
        // ]);
        // JabatanStruktural::create([
        //     'name' => 'kepala upa perawatan dan perbaikan'
        // ]);
        // JabatanStruktural::create([
        //     'name' => 'kepala upa pengembangan karir dan kewirausahaan'
        // ]);
        // JabatanStruktural::create([
        //     'name' => 'kepala upa layanan uji kompetensi'
        // ]);
        // JabatanStruktural::create([
        //     'name' => 'kepala upa laboratorium terpadu'
        // ]);



    }
}





