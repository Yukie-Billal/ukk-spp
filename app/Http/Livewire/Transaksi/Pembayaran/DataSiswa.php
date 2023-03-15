<?php

namespace App\Http\Livewire\Transaksi\Pembayaran;

use App\Models\Siswa;
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
        return view('livewire.transaksi.pembayaran.data-siswa');
    }
}
