<?php

namespace App\Http\Livewire\Transaksi\Pembayaran;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HistoriTahun extends Component
{
    public $tahun;
    public $siswa;

    public function updatedTahun($value)
    {
        
    }

    public function render()
    {
        if (Auth::guard('siswa') && $this->tahun == null) {
            $this->siswa = Auth::guard('siswa')->user();
            $this->tahun = $this->siswa->spp->tahun;
            $this->emit('setTahun', $this->siswa->spp->tahun);
        }
        if ($this->tahun == null) {
            $this->tahun = date('Y');
        }
        return view('livewire.transaksi.pembayaran.histori-tahun');
    }
}
