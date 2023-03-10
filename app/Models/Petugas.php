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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
