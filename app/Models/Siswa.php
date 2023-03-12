<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded  = [];
    protected $table = 'siswa';
    protected $primaryKey = 'nisn';

    protected $hidden = [
        'password','remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function spp()
    {
        return $this->belongsTo(Spp::class);
    }

    public function getRouteKeyName()
    {
        return 'nisn';
    }
}
