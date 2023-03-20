<?php

namespace App\Http\Livewire\Laporan;

use App\Exports\PembayaransExport;
use App\Models\Pembayaran;
use Livewire\Component;
use App\Exports\UsersExport;
use App\Models\Petugas;
use Maatwebsite\Excel\Facades\Excel;

class LaporanIndex extends Component
{
    public $tglAwal;
    public $tglAkhir;
    public $petugasId;
    protected $listeners = [
        'setPetugas',
    ];
    public function setPetugas($value)
    {
        $this->petugasId = $value;
    }
    
    public function print()
    {
        $this->emit('setTanggal', [$this->tglAwal, $this->tglAkhir]);
    }
    public function excel()
    {
        return (new PembayaransExport($this->tglAwal, $this->tglAkhir))->download('pembayarans.xlsx');
        // $this->emit('toastify',['danger', 'Fitur belum Tersedia', 3000]);
    }
    public function pdf()
    {
        return (new PembayaransExport($this->tglAwal, $this->tglAkhir))->download('invoices.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
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
        if ($this->petugasId != null && $this->petugasId != 'all') {
            $pembayaran->where('petugas_id', $this->petugasId);
        }
        return view('livewire.laporan.laporan-index', [
            'pembayarans' => $pembayaran->get(),
            'petugases' => Petugas::orderByDesc('nama_petugas')->get(),
        ]);
    }
}
