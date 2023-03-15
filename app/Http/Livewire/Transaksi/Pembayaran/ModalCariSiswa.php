<?php

namespace App\Http\Livewire\Transaksi\Pembayaran;

use App\Models\Siswa;
use Livewire\Component;

class ModalCariSiswa extends Component
{
    public $search;
    protected $queryString = [
        'search' => ['except' => '']
    ];
    public function pilihSiswa($nisn)
    {
        $this->emit('getSiswa',$nisn);
    }
    public function render()
    {
        $siswa = Siswa::orderByDesc('nisn')->orderByDesc('nis')->orderByDesc('nama');
        if ($this->search != null) {
            $siswa->where('nisn', 'like', '%' . $this->search . '%')->orWhere('nis', 'like', '%' . $this->search . '%')->orWhere('nama', 'like', '%' . $this->search . '%'); //->orWhere('', 'like', '%' . $this->search . '%');
        }
        return view('livewire.transaksi.pembayaran.modal-cari-siswa', [
            'siswas' => $siswa->get(),
        ]);
    }
}
