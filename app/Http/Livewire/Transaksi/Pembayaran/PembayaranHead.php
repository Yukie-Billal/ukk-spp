<?php

namespace App\Http\Livewire\Transaksi\Pembayaran;

use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PembayaranHead extends Component
{
    public $tahun;
    public $tahunMasuk;
    public $siswa;
    public $punyaSiswa = 0;

    protected $listeners = [
        'getSiswa',
    ];
    public function getSiswa($nisn)
    {
        $siswa = Siswa::find($nisn);
        $this->siswa = $siswa;
        $this->tahun = $siswa->spp->tahun;
        $this->tahunMasuk = $siswa->spp->tahun;
        $this->emit('setTahun', $siswa->spp->tahun);
        $this->emit('setTahunMasuk', $siswa->spp->tahun);
    }

    public function render()
    {
        if ($this->tahun == null) {
            $this->tahunMasuk = 0;
            $this->tahun = date('Y');
        }
        if (Auth::guard('siswa')->check()) {
            $this->getSiswa(Auth::guard('siswa')->user()->nisn);
            $this->punyaSiswa = true;
        }
        return view('livewire.transaksi.pembayaran.pembayaran-head');
    }
}
