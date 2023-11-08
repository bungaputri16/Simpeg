<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'atasan_langsung_id',  
        'jabatan_berwenang_id',
    ];
    
    public function jabatanfungsional(){
        return $this->hasMany(UnitKerjaHasJabatanFungsional::class);
    }
    // public function atasanlangsung(){
    //     return $this->hasOne(UnitKerjaHasAtasanLangsung::class);
    // }
    // public function atasanberwenang(){
    //     return $this->hasOne(UnitKerjaHasAtasanBerwenang::class);
    // }
    public function jabatanberwenang(){
        return $this->belongsTo(JabatanStruktural::class,'jabatan_berwenang_id');
    }
    public function atasanlangsung(){
        return $this->belongsTo(JabatanStruktural::class,'atasan_langsung_id');
    }
    
}




