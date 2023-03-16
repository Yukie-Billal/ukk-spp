<?php

namespace App\Http\Livewire\Transaksi\Pembayaran;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DataSiswa extends Component
{
    public $siswa;
    protected $listeners = [
        'getSiswa',
    ];
    public function getSiswa($nisn)
    {
        $siswa = Siswa::find($nisn);
        $this->siswa = $siswa;
    }
    public function render()
    {
        if (Auth::guard('siswa')->check()) {
            $siswa = Auth::guard('siswa')->user()->nisn;
            $this->siswa = Siswa::find($siswa);
        }
        return view('livewire.transaksi.pembayaran.data-siswa');
    }
}
