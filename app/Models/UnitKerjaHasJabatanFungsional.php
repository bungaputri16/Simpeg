<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerjaHasJabatanFungsional extends Model
{
    use HasFactory;
    protected $fillable = [
        'unit_kerja_id',
        'name',
    ];

    public function unitkerja(){
        return $this->belongsTo(UnitKerja::class,'unit_kerja_id');
    }
}
