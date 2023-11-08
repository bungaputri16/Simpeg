<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogHarian extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name', 
        'deskripsi', 
        'waktu_mulai',
        'waktu_akhir',
        'file_pendukung'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
