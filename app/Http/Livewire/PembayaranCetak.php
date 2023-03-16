<?php

namespace App\Http\Livewire;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Livewire\Component;
use App\Traits\ListenerTrait;
use Illuminate\Database\Query\Builder;

class PembayaranCetak extends Component
{
    use ListenerTrait;
    public $siswa;
    public $pembayaran;
    public $daftarBulan;

    protected $listeners = [
        'fresh','swal','toastify',
        'cetakPembayaran',
        'cetakBanyak',
    ];
    public function cetakBanyak($params)
    {
        $this->daftarBulan = $params[1];
        $this->siswa = Siswa::find($params[0]); 
    }
    public function cetakPembayaran($id)
    {
        $this->pembayaran = Pembayaran::find($id);
        $this->siswa = Siswa::find($this->pembayaran->nisn);        
    }
    public function render()
    {
        $pembayaran = Pembayaran::orderByDesc('bulan_dibayar');
        if ($this->siswa != null) {
            $pembayaran->where('nisn', $this->siswa->nisn);
            if ($this->pembayaran != null) {
                $pembayaran->where('bulan_dibayar', $this->pembayaran->bulan_dibayar);
            }
        }
        if ($this->daftarBulan) {
            // $pembayaran->where(function (Builder $query)
            // {
                // foreach ($this->daftarBulan as $key => $value) {
                //     $query->orWhere('bulan_dibayar', $value);
                // }
            // });
            foreach ($this->daftarBulan as $key => $value) {
                $pembayaran->orWhere('bulan_dibayar', $value);
            }
        }
        return view('livewire.pembayaran-cetak', [
            'pembayarans' => $pembayaran->get(),
        ]);
    }
}
