<?php

namespace App\Http\Livewire\Transaksi\Pembayaran;

use App\Models\Bulan;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PembayaranCreate extends Component
{
    public $tanggalBayar;
    public $bulan;
    public $tahun;
    public $siswa;
    
    protected $listeners = [
        'getSiswaPembayaran',
        'getBulanPembayaran',
        'getTahunPembayaran',
    ];

    public function getSiswaPembayaran($nisn)
    {
        $siswa = Siswa::find($nisn);
        $this->siswa = $siswa;
    }
    public function getBulanPembayaran($bulan)
    {
        $bulan = Bulan::find($bulan);
        if ($bulan) {
            $this->bulan = $bulan;
        } else {
            $this->emit('closeModal', '#modalTambahPembayaran');
        }
    }
    public function getTahunPembayaran($tahun)
    {
        $this->tahun = $tahun;
    }

    public function store()
    {
        $pembayaran = Pembayaran::create([
            'petugas_id' => Auth::guard('petugas')->user()->petugas_id,
            'nisn' => $this->siswa->nisn,
            'tgl_bayar' => $this->tanggalBayar,
            'bulan_dibayar' => $this->bulan,
            'tahun_dibayar' => $this->tahun,
            'spp_id' => $this->siswa->spp->id,
            'jumlah_bayar' => $this->siswa->spp->nominal,
            'bayar' => 1,
        ]);
        if ($pembayaran) {
            // $this->emit('swal', ['success','Berhasil melakukan Pembayaran', 3000]);
            $this->emit('cetakBonSPP', $pembayaran->pembayaran_id);
        } else {
            $this->emit('swal', ['error','Gagal melakukan Pembayaran', 3000]);
        }
    }
    public function render()
    {
        if ($this->tanggalBayar == null) {
            $this->tanggalBayar = date('Y-m-d');
        }
        return view('livewire.transaksi.pembayaran.pembayaran-create');
    }
}
