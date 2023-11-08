<?php

namespace Database\Seeders;

use App\Models\JabatanStruktural;
use App\Models\UnitKerja;
// use App\Models\UnitKerjaHasAtasanBerwenang;
// use App\Models\UnitKerjaHasAtasanLangsung;
use App\Models\UnitKerjaHasJabatanFungsional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $wadir1 = JabatanStruktural::where('name', 'wadir 1')->first();
        $wadir2 = JabatanStruktural::where('name', 'wadir 2')->first();
        // $wadir3 = JabatanStruktural::where('name', 'wadir 3')->first();

        $jabatanStrukturalKesehatan = JabatanStruktural::create([
            'name' => 'ketua jurusan kesehatan'
        ]);
        $jurusanKesehatan = UnitKerja::create([
            'name' => 'jurusan kesehatan',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $jabatanStrukturalKesehatan->id,

        ]);

        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen lektor',
            'unit_kerja_id' => $jurusanKesehatan->id,
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen ahli',
            'unit_kerja_id' => $jurusanKesehatan->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $jurusanKesehatan->id,
        //     'jabatan_struktural_id' => $jabatanStrukturalKesehatan->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $jurusanKesehatan->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        $jabatanStrukturalTI = JabatanStruktural::create([
            'name' => 'ketua jurusan teknik informatika'
        ]);
        $jurusanTI = UnitKerja::create([
            'name' => 'jurusan teknik informatika',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $jabatanStrukturalTI->id,

        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen lektor',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen ahli',
            'unit_kerja_id' => $jurusanTI->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $jurusanTI->id,
        //     'jabatan_struktural_id' => $jabatanStrukturalTI->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $jurusanTI->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        
        $jurusanStrukturalTeknik = JabatanStruktural::create([
            'name' => 'ketua jurusan teknik'
        ]);
        $jurusanteknik = UnitKerja::create([
            'name' => 'jurusan teknik',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $jurusanStrukturalTeknik->id,


        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen lektor',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen ahli',
            'unit_kerja_id' => $jurusanteknik->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $jurusanteknik->id,
        //     'jabatan_struktural_id' => $jurusanStrukturalTeknik->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $jurusanteknik->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);
        



        $strukturalPusatPenjaminMutudanPengembanganPembelajaran = JabatanStruktural::create([
            'name' => 'ketua pusat penjaminan mutu dan pengembangan pembelajaran',
        ]);
        $pusatPenjaminMutudanPengembanganPembelajaran = UnitKerja::create([
            'name' => 'pusat penjaminan mutu dan pengembangan pembelajaran',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalPusatPenjaminMutudanPengembanganPembelajaran->id,

        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen lektor',
            'unit_kerja_id' => $pusatPenjaminMutudanPengembanganPembelajaran->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen ahli',
            'unit_kerja_id' => $pusatPenjaminMutudanPengembanganPembelajaran->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $pusatPenjaminMutudanPengembanganPembelajaran->id,
        //     'jabatan_struktural_id' => $strukturalPusatPenjaminMutudanPengembanganPembelajaran->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $pusatPenjaminMutudanPengembanganPembelajaran->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);



        $strukturalUpaPerpustakaan = JabatanStruktural::create([
            'name' => 'ketua upa perpustakaan'
        ]);
        $upaPerpustakaan = UnitKerja::create([
            'name' => 'upa perpustakaan',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalUpaPerpustakaan->id,


        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen lektor',
            'unit_kerja_id' => $upaPerpustakaan->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen ahli',
            'unit_kerja_id' => $upaPerpustakaan->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upaPerpustakaan->id,
        //     'jabatan_struktural_id' => $strukturalUpaPerpustakaan->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upaPerpustakaan->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        $strukturalUpaTik = JabatanStruktural::create([
            'name' => 'ketua upa teknologi informasi dan komunikasi'
        ]);
        $upaTik = UnitKerja::create([
            'name' => 'upa teknologi informasi dan komunikasi',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalUpaTik->id,

        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen lektor',
            'unit_kerja_id' => $upaTik->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen ahli',
            'unit_kerja_id' => $upaTik->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upaTik->id,
        //     'jabatan_struktural_id' => $strukturalUpaTik->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upaTik->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        $strukturalPusatPenelitiandanPengabdian = JabatanStruktural::create([
            'name' => 'ketua pusat penelitian dan pengabdian kepada masyarakat (p3m)'
        ]);

        $pusatPenelitiandanPengabdian = UnitKerja::create([
            'name' => 'pusat penelitian dan pengabdian kepada masyarakat (p3m)',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalPusatPenelitiandanPengabdian->id,

        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen lektor',
            'unit_kerja_id' => $pusatPenelitiandanPengabdian->id
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'name' => 'dosen ahli',
            'unit_kerja_id' => $pusatPenelitiandanPengabdian->id
        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $pusatPenelitiandanPengabdian->id,
        //     'jabatan_struktural_id' => $strukturalPusatPenelitiandanPengabdian->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $pusatPenelitiandanPengabdian->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);




        $strukturalUpaBahasa = JabatanStruktural::create([
            'name' => 'ketua upa bahasa'
        ]);
        $upabahasa = UnitKerja::create([
            'name' => 'upa bahasa',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalUpaBahasa->id,

        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upabahasa->id,
        //     'jabatan_struktural_id' => $strukturalUpaBahasa->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upabahasa->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        $strukturalPerawatandanPerbaikan = JabatanStruktural::create([
            'name' => 'ketua upa perawatan dan perbaikan'
        ]);
        $upaPerawatandanPerbaikan = UnitKerja::create([
            'name' => 'upa perawatan dan perbaikan',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalPerawatandanPerbaikan->id,

        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upaPerawatandanPerbaikan->id,
        //     'jabatan_struktural_id' => $strukturalPerawatandanPerbaikan->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upaPerawatandanPerbaikan->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        $strukturalUpaPengKarir = JabatanStruktural::create([
            'name' => 'ketua upa pengembangan karir dan kewirausahaan'
        ]);

        $upaPengKarirDanKewirausahaan = UnitKerja::create([
            'name' => 'upa pengembangan karir dan kewirausahaan',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalUpaPengKarir->id,

        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upaPengKarirDanKewirausahaan->id,
        //     'jabatan_struktural_id' => $strukturalUpaPengKarir->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upaPengKarirDanKewirausahaan->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);

        
        $strukturalUpaUjiKompetensi = JabatanStruktural::create([
            'name' => 'ketua upa layanan uji kompetensi'
        ]);
        $upaPengLayananUjiKompetensi = UnitKerja::create([
            'name' => 'upa layanan uji kompetensi',
            'has_atasan_langsung' =>true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalUpaUjiKompetensi->id,

        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upaPengLayananUjiKompetensi->id,
        //     'jabatan_struktural_id' => $strukturalUpaUjiKompetensi->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upaPengLayananUjiKompetensi->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        $strukturalLaboratoriumTerpadu = JabatanStruktural::create([
            'name' => 'ketua upa laboratorium terpadu'
        ]);
        $upaPengLaboratoriumTerpadu = UnitKerja::create([
            'name' => 'upa laboratorium terpadu',
            'has_atasan_langsung' => true,
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $strukturalLaboratoriumTerpadu->id,

        ]);
        
        // UnitKerjaHasAtasanLangsung::create([
        //     'unit_kerja_id' => $upaPengLaboratoriumTerpadu->id,
        //     'jabatan_struktural_id' => $strukturalLaboratoriumTerpadu->id
        // ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $upaPengLaboratoriumTerpadu->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);



        $bagianPerencanaanKeuangandanUmum = UnitKerja::create([
            'name' => 'bagian perencanaan, keuangan, dan umum',
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $wadir2->id,
        ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $bagianPerencanaanKeuangandanUmum->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);


        $subbagianUmum = UnitKerja::create([
            'name' => 'subbagian umum',
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $wadir2->id,
        ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $subbagianUmum->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);




        $akademikdankemahasiswaan = UnitKerja::create([
            'name' => 'bagian akademik dan kemahasiswaan',
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $wadir2->id,
        ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $akademikdankemahasiswaan->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);



        $subbagianAkademik = UnitKerja::create([
            'name' => 'subbagian akademik',
            'jabatan_berwenang_id' => $wadir2->id,
            'atasan_langsung_id' => $wadir2->id,
        ]);
        // UnitKerjaHasAtasanBerwenang::create([
        //     'unit_kerja_id' => $subbagianAkademik->id,
        //     'jabatan_struktural_id' => $wadir2->id
        // ]);
        
        
    }
}
