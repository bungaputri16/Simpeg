<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerjaHasAtasanLangsung extends Model
{
    use HasFactory;
    protected $fillable = [
        'unit_kerja_id',
        'jabatan_struktural_id',
    ];

    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class,'unit_kerja_id');
    }
    public function jabatanstruktural()
    {
        return $this->belongsTo(JabatanStruktural::class);
    }
}
