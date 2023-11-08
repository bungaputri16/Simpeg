<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanStruktural extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'is_wewenang'
    ];

    // public function atasanlangsung(){
    //     return $this->hasOne(UnitKerjaHasAtasanLangsung::class);
    // }
    public function unitkerja(){
        return $this->hasMany(UnitKerja::class,'jabatan_berwenang_id');
    }
    public function unitkerjaatasanlangsung(){
        return $this->hasOne(UnitKerja::class,'atasan_langsung_id');
    }
    // public function atasanberwenang(){
    //     return $this->hasOne(UnitKerjaHasAtasanBerwenang::class);
    // }
    public function pegawaiStruktural(){
        return $this->hasOne(PegawaiHasStruktural::class);
    }

   


}
