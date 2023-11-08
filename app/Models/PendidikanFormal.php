<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanFormal extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_perguran_tinggi',
        'program_studi',
        'gelar_akademik',
        'bidang_studi',
        'tahun_masuk',
        'tahun_lulus',
        'tanggal_kelulusan',
        'nim',
        'jumlah_semester_tempuh',
        'jumlah_sks_kelulusan',
        'ipk_kelulusan',
        'nomor_sk_penyetaraan',
        'tanggal_sk_penyetaraan',
        'nomor_ijazah',
        'judul_tesis',
        'file_pendukung',
    ];
}
