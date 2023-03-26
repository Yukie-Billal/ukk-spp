<?php

namespace App\Http\Livewire\Laporan;

use App\Models\Pembayaran;
use App\Models\Petugas;
use Livewire\Component;
use Livewire\Livewire;

class LaporanPrint extends Component
{
    public $tglAwal;
    public $tglAkhir;
    public $petugas;

    protected $listeners = [
        'setTanggal',
    ];
    public function setTanggal($params)
    {
        $this->tglAwal = $params[0];
        $this->tglAkhir = $params[1];
        if ($params[2] == 'all' || $params[2] == null) {
            $this->petugas = 'all';
        } else {
            $this->petugas = Petugas::find($params[2]);
        }
        $this->render();
        $this->emit('printThis');
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
        return view('livewire.laporan.laporan-print', [
            'pembayarans' => $pembayaran->get(),
        ]);
    }
}
