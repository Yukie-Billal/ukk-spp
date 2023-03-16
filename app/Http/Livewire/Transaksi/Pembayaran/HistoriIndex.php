<?php

namespace App\Http\Livewire\Transaksi\Pembayaran;

use App\Models\Bulan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HistoriIndex extends Component
{
    public $siswa;
    public $tahun;

    protected $listeners = [
        'setTahun',
    ];

    public function setTahun($value)
    {
        $this->tahun = $value;
    }
    public function render()
    {
        $pembayaran = Pembayaran::orderByDesc('created_at');
        if (Auth::guard('siswa')->check()) {
            $this->siswa = Auth::guard('siswa')->user();        
        } elseif (Auth::guard()) {
            // $this->siswa = 1;
        }
        if ($this->siswa != null) {
            $pembayaran->where('nisn', $this->siswa->nisn);
        }
        if ($this->tahun != null) {
            $pembayaran->where('tahun_dibayar', $this->tahun);
        }
        
        return view('livewire.transaksi.pembayaran.histori-index', [
            'bulans' => Bulan::all(),
            'pembayarans' => $pembayaran->get(),
        ]);
    }
}
