<?php

namespace App\Http\Livewire\Transaksi\Pembayaran;

use App\Models\Bulan;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Livewire\Component;
use App\Traits\ListenerTrait;
use Illuminate\Support\Facades\Auth;
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
        'batalkanSemua',
        'simpanSemua',
        'cetakSemua',
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
    public function batalkanSemua($params)
    {
        if ($this->siswa && $this->tahun && $this->pilih) {
            $delete = false;
            foreach ($params as $key => $value) {
                $pembayaran = Pembayaran::where('nisn', $this->siswa->nisn)->where('tahun_dibayar', $this->tahun)->where('bulan_dibayar', $value)->first();
                if ($pembayaran) {
                    $delete  = $pembayaran->delete();
                }
            }
            if ($delete) {
                $this->emit('toastify',['success','Pembayaran Dibatalkan', 2500]);
            } else {
                $this->emit('toastify',['danger','Gagal Membatalkan', 2500]);
            }
        } else {
            $this->emit('toastify', ['danger','Pembayaran Tidak Tersedia', 2500]);
        }
    }
    public function simpanSemua($params)
    {
        if ($this->siswa && $this->tahun && $this->pilih) {
            $simpan = false;
            foreach ($params as $key => $value) {
                $pembayaran = Pembayaran::where('nisn', $this->siswa->nisn)->where('tahun_dibayar', $this->tahun)->where('bulan_dibayar', $value)->first();
                if (!$pembayaran) {
                    $simpan = Pembayaran::create([
                        'petugas_id' => Auth::guard('petugas')->user()->petugas_id,
                        'nisn' => $this->siswa->nisn,
                        'tgl_bayar' => date('Y-m-d'), //$this->tanggalBayar,
                        'bulan_dibayar' => $value,
                        'tahun_dibayar' => $this->tahun,
                        'spp_id' => $this->siswa->spp->id,
                        'jumlah_bayar' => $this->siswa->spp->nominal,
                    ]);
                }
            }
            if ($simpan) {
                $this->emit('toastify',['success','Pembayaran Berhasil Disimpan', 2500]);
            } else {
                $this->emit('toastify',['danger','Pembayaran Tidak Tersedia', 2500]);
            }
        } else {
            $this->emit('toastify', ['danger','Pembayaran Tidak Tersedia', 2500]);
        }
    }
    public function cetakSemua($params)
    {
        if ($this->siswa && $this->tahun && $this->pilih) {
            $cetak = false;
            $bulanCetak = [];
            foreach ($params as $key => $value) {
                $pembayaran = Pembayaran::where('nisn', $this->siswa->nisn)->where('tahun_dibayar', $this->tahun)->where('bulan_dibayar', $value)->first();
                if ($pembayaran) {
                    $bulanCetak[] = $value;
                    $cetak = true;
                } else {
                    $cetak = false;
                }
            }
            // dd($bulanCetak);
            if ($cetak) {
                $this->emit('cetakBanyak',[$this->siswa->nisn, $bulanCetak]);
            } else {
                $this->emit('toastify',['danger','Pembayaran Sudah Tersedia', 2500]);
            }
        } else {
            $this->emit('toastify', ['danger','Pembayaran Tidak Tersedia', 2500]);
        }
    }

    public function render()
    {
        // $p = Pembayaran::first()->get();
        // $y = $p[0]->tgl_bayar->format('D');
        // dd(__('kalendar.'.$y));
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
