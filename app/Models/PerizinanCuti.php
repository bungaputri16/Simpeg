<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerizinanCuti extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'alasan',
        'alamat_selama_cuti',
        'jenis_cuti_id',
        'tgl_mulai',
        'tgl_selesai',
        'pertimbangan_atasan_langsung',
        'keputusan_pejabat_berwenang',
        'file_pendukung',
        'alasan_dari_atasan'
    ];
    public function jeniscuti(){
        return $this->belongsTo(JenisCuti::class,'jenis_cuti_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function perizinanCutiHasPegawaiStruktural(){
        // return $this->belongsTo(JenisCuti::class,'user_id');
    }
    
}
