<?php

namespace App\Http\Livewire\DataMaster\Kelas;

use App\Models\Kelas;
use Livewire\Component;
use App\Traits\ListenerTrait;

class KelasEdit extends Component
{
    use ListenerTrait;
    public $idKelas;
    public $nama_kelas;
    public $kompetensi_keahlian;

    protected $listeners = [
        'swal','fresh','toastify',
        'getKelas',
    ];

    public function getKelas($id)
    {
        $kelas = Kelas::find($id)->first();
        $this->idKelas = $kelas->id;
        $this->nama_kelas = $kelas->nama_kelas;
        $this->kompetensi_keahlian = $kelas->kompetensi_keahlian;
    }

    public function edit()
    {
        $kelas = Kelas::find($this->idKelas);
        $kelas->update([
            'nama_kelas' => $this->nama_kelas,
            'kompetensi_keahlian' => $this->kompetensi_keahlian,
        ]);
        if ($kelas) {
            $this->emit('toastify', ['success','Berhasil Mengubah Kelas', 3000]);
        } else {
            $this->emit('toastify', ['danger','Kelas Tidak Ditemukan', 3000]);            
        }
    }

    public function render()
    {
        return view('livewire.data-master.kelas.kelas-edit');
    }
}
