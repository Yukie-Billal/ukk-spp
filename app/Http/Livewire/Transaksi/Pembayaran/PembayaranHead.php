<?php

namespace App\Http\Livewire\Transaksi\Pembayaran;

use App\Models\Siswa;
use Livewire\Component;

class PembayaranHead extends Component
{
    public $tahun;
    public $tahunMasuk;

    protected $listeners = [
        'getSiswa',
    ];
    public function getSiswa($nisn)
    {
        $siswa = Siswa::find($nisn);
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
        return view('livewire.transaksi.pembayaran.pembayaran-head');
    }
}
