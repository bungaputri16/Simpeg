<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status_perkawinan', 
        'nama_pasangan', 
        'pekerjaan_pasangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
