<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nip',
        'email',
        'password',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_ibu',
        'role',
        // 'file_pendukung',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getJWTIdentifier(){
        return $this->getKey();
    }
    public function getJWTCustomClaims(){
        return [];
    }
    public function kependudukan(){
        return $this->hasOne(Kependudukan::class);
    }
    public function keluarga(){
        return $this->hasOne(Keluarga::class);
    }
    public function kepegawaian(){
        return $this->hasOne(Kepegawaian::class);
    }
    public function alamatdankontak(){
        return $this->hasOne(AlamatdanKontak::class);
    }
    
    public function lainlain(){
        return $this->hasOne(Lainlain::class);
    }
    public function tandaTangan(){
        return $this->hasOne(TandaTangan::class);
    }


    public function pegawaiFungsional(){
        return $this->hasOne(PegawaiFungsional::class);
    }
    public function pegawaiStruktural(){
        return $this->hasOne(PegawaiHasStruktural::class, 'users_id');
    }
}
