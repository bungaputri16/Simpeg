<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiFungsional extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'unit_kerja_has_jabatan_fungsional_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function unit_kerja_has_jabatan_fungsional()
    {
        return $this->belongsTo(UnitKerjaHasJabatanFungsional::class);
    }
}
