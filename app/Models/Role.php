<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    public function petugas()
    {
        return $this->hasMany(Petugas::class);
    }
}
