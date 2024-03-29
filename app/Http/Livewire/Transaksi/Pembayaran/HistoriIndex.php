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
    public $admin = false;
    // public $petugas;
    public $petugas_id;

    protected $listeners = [
        'setTahun',
        'setPetugas',
    ];

    public function setTahun($value)
    {
        $this->tahun = $value;
    }
    public function setPetugas($value)
    {
        $this->petugas_id = $value;
    }
    public function render()
    {
        if (Auth::guard('petugas')->check()) {
            if (Auth::guard('petugas')->user()->role->nama_role == 'admin') {
                $this->admin = true;
            }
            if (Auth::guard('petugas')->user()->role->nama_role == 'petugas') {
                $this->admin = false;
                $this->petugas_id = Auth::guard('petugas')->user()->petugas_id;
            }
        }
        $pembayaran = Pembayaran::orderByDesc('created_at');
        if (Auth::guard('siswa')->check()) {
            $this->siswa = Auth::guard('siswa')->user();        
        }

        if ($this->petugas_id != null && $this->petugas_id != 'all') {
            $pembayaran->where('petugas_id', $this->petugas_id);
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
