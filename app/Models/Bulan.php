<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    use HasFactory;

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'bulan_dibayar');
    }
}
