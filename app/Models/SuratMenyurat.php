<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMenyurat extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'isi',  
        'is_read',
        'file_pendukung',
        'file_pendukung',
        'pengirim_id',
        'penerima_id',
        'unit_kerja_id',
    ];
    
    public function pengirim(){
        return $this->belongsTo(User::class,'pengirim_id');
    }
    public function penerima(){
        return $this->belongsTo(User::class,'penerima_id');
    }
    public function unitkerja(){
        return $this->belongsTo(UnitKerja::class,'unit_kerja_id');
    }
    
}



