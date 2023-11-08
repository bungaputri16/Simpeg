<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepegawaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jabatan_fungsional', 
        'unit_jurusan', 
        'jabatan_struktural'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
