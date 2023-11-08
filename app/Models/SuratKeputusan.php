<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeputusan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor',
        'file_pendukung',
    ];

    public function penerima(){
        return $this->hasMany(SuratKeputusanHasPenerima::class);
    }
}
