<?php

namespace App\Http\Livewire;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Livewire\Component;
use App\Traits\ListenerTrait;

class PembayaranCetak extends Component
{
    use ListenerTrait;
    public $siswa;
    public $pembayaran;

    protected $listeners = [
        'fresh','swal','toastify',
        'cetakPembayaran',
    ];
    public function cetakPembayaran($id)
    {
        $this->pembayaran = Pembayaran::find($id);
        // dd($this->pembayarsan);
        $this->siswa = Siswa::find($this->pembayaran->nisn);        
    }
    public function render()
    {
        $pembayaran = Pembayaran::orderByDesc('bulan_dibayar');
        if ($this->siswa != null) {
            $pembayaran->where('nisn', $this->siswa->nisn)->where('bulan_dibayar', $this->pembayaran->bulan_dibayar);
        }
        return view('livewire.pembayaran-cetak', [
            'pembayarans' => $pembayaran->get(),
        ]);
    }
}
