<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kependudukan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nik', 
        'agama', 
        'kewarganegaraan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
