<?php

namespace App\Http\Livewire\Transaksi\Pembayaran;

use App\Models\Bulan;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Livewire\Component;
use App\Traits\ListenerTrait;
use Illuminate\Support\Facades\DB;

class PembayaranIndex extends Component
{
    use ListenerTrait;
    public $siswa;
    public $tahun;
    public $pilih;

    protected $listeners = [
        'swal','fresh','toastify',
        'setTahun',
        'getSiswa',
        'deletePembayaran',
    ];
    public function updatedPilih($value)
    {
        if ($value) {
            $this->emit('freshPilihButton');
        } else {
            $this->emit('refreshButton');
        }
    }
    public function getSiswa($nisn)
    {
        $siswa = Siswa::find($nisn);
        $this->siswa = $siswa;
        $this->tahun = $siswa->spp->tahun;
    }
    public function setTahun($value)
    {
        $this->tahun = $value;
    }

    public function deletePembayaran($id)
    {
        $pembayaran = Pembayaran::find($id);
        if ($pembayaran) {
            $pembayaran->delete();
            $this->emit('toastify', ['success','Pembayaran Dibatalkan', 3000]);
        } else {
            $this->emit('toastify', ['danger','Terjadi kesalahan', 3000]);
        }
    }

    public function render()
    {
        if ($this->tahun == null) {
            $this->tahun = date('Y');
        }
        $pembayaran = Pembayaran::orderBy('tahun_dibayar', 'asc')->orderByDesc('bulan_dibayar', 'asc');
        if ($this->tahun != null) {
            $pembayaran->where('tahun_dibayar', $this->tahun);
        }
        if ($this->siswa != null) {
            $pembayaran->where('nisn', $this->siswa->nisn);
        }

        return view('livewire.transaksi.pembayaran.pembayaran-index', [
            'pembayarans' => $pembayaran->get(),
            'bulans' => Bulan::all(),
        ]);
    }
}
