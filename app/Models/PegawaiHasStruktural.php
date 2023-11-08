<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiHasStruktural extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'jabatan_struktural_id',
    ];

    public function users(){
        return $this->belongsTo(User::class,'users_id');
    }
    public function jabatanStruktural(){
        return $this->belongsTo(JabatanStruktural::class,'jabatan_struktural_id');
    }
}
