<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['pembayaran_id'];
    protected $primaryKey = 'pembayaran_id';

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}
