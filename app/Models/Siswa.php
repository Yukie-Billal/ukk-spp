<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded  = [];
    protected $table = 'siswa';
    protected $primaryKey = 'nisn';

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'kelas_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
