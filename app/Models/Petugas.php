<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Petugas extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $guarded = [];
    protected $hidden = ['password'];
    protected $primaryKey = 'petugas_id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
