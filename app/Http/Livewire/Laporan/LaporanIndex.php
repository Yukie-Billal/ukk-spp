<?php

namespace App\Http\Livewire\Laporan;

use App\Models\Pembayaran;
use Livewire\Component;

class LaporanIndex extends Component
{
    public $tglAwal;
    public $tglAkhir;
    
    public function print()
    {
        $this->emit('setTanggal', [$this->tglAwal, $this->tglAkhir]);
    }

    public function render()
    {
        if ($this->tglAwal == null && $this->tglAkhir == null) {
            $this->tglAwal = date('Y-m-d');
            $this->tglAkhir = date('Y-m-d');
        }

        $pembayaran = Pembayaran::orderByDesc('tgl_bayar')->orderByDesc('tahun_dibayar')->orderByDesc('bulan_dibayar');
        if ($this->tglAwal) {
            $pembayaran->whereDate('tgl_bayar', '>=', $this->tglAwal);
        }
        if ($this->tglAkhir) {
            $pembayaran->whereDate('tgl_bayar', '<=', $this->tglAkhir);
        }
        return view('livewire.laporan.laporan-index', [
            'pembayarans' => $pembayaran->get(),
        ]);
    }
}