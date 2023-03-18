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
        'getDataPembayaran',
    ];
    // array type [siswa nisn, bulan id, tahun 'YYYY']
    public function getDataPembayaran($params)
    {
        $this->siswa = Siswa::find($params[0]);
        $bulan = Bulan::find($params[1]);
        if ($bulan) {
            $this->bulan = $bulan;
        } else {
            $this->emit('closeModal', '#modalTambahPembayaran');
        }
        $this->tahun = $params[2];
    }

    public function store()
    {
        $pembayaran = Pembayaran::create([
            'petugas_id' => Auth::guard('petugas')->user()->petugas_id,
            'nisn' => $this->siswa->nisn,
            'tgl_bayar' => $this->tanggalBayar,
            'bulan_dibayar' => $this->bulan->id,
            'tahun_dibayar' => $this->tahun,
            'spp_id' => $this->siswa->spp->id,
            'jumlah_bayar' => $this->siswa->spp->nominal,
        ]);
        if ($pembayaran) {
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
