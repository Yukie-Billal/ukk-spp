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
        $this->siswa = Siswa::find($this->pembayaran->nisn);        
    }
    public function render()
    {
        return view('livewire.pembayaran-cetak');
    }
}