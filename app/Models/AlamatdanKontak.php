<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatdanKontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'provinsi',
        'kota',
        'kecamatan',
        'desa_kelurahan',
        'rt', 
        'rw',
        'kodepos',
        'alamat', 
        'no_telp_rumah',
        'no_hp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
