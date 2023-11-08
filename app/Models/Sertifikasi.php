<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikasi extends Model
{
    use HasFactory;
    protected $fillable =
    [
    'user_id',
    'jenis_sertifikasi',
    'bidang_studi',
    'no_regis_pendidik',
    'no_sk',
    'tahun_sertifikasi'
    ];
}
