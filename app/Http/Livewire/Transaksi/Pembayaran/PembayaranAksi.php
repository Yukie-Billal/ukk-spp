<?php

namespace App\Http\Livewire\Transaksi\Pembayaran;

use Livewire\Component;

class PembayaranAksi extends Component
{
    public $bulan;
    public $pilih;
    public $text;
    public $warna;
    public $idPembayaran;
    public $tahun;

    public function bayar()
    {
        $this->emit('toastify', ['success', 'Berhaisl Memanggil Elemetn', 3000]);
    }

    public function batalBayar()
    {
        $this->emit('toastify', ['danger', 'Pesan Batalkan']);
    }

    public function render()
    {
        return view('livewire.transaksi.pembayaran.pembayaran-aksi');
    }
}
