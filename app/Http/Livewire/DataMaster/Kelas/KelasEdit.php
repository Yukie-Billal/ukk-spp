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
    
    protected $rules = [
        'idKelas' => 'required',
        'nama_kelas' => 'required',
        'kompetensi_keahlian' => 'required|min:5',
    ];
    protected $messages = [
        'nama_kelas.required' => 'Nama Kelas Wajib Di isi',
        'kompetensi_keahlian.required' => 'Kompetensi Keahlian Wajib Di isi',
        'kompetensi_keahlian.min' => 'Kompetensi Keahlian Memiliki Minimal :min huruf',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function getKelas($id)
    {
        $kelas = Kelas::find($id)->first();
        if ($kelas) {                          
            $this->idKelas = $kelas->id;
            $this->nama_kelas = $kelas->nama_kelas;
            $this->kompetensi_keahlian = $kelas->kompetensi_keahlian;
        } else {
            $this->emit('toastify', ['danger','Kelas Tidak Ditemukan',3000]);
        }
    }

    public function edit()
    {
        $this->validate();
        $kelas = Kelas::find($this->idKelas);
        $cek = Kelas::where('nama_kelas', 'like', '%'. $this->nama_kelas .'%')->get()->first();
        if ($cek->id == $kelas->id ) {
            $kelas->update([
                'nama_kelas' => $this->nama_kelas,
                'kompetensi_keahlian' => $this->kompetensi_keahlian,
            ]);
            if ($kelas) {
                $this->emit('toastify', ['success','Berhasil Mengubah Kelas', 3000]);
            } else {
                $this->emit('toastify', ['danger','Kelas Tidak Ditemukan', 3000]);            
            }
        } else {
            $this->emit('toastify', ['danger','Kelas Telah Tersedia', 3000]);
        }
    }

    public function render()
    {
        return view('livewire.data-master.kelas.kelas-edit');
    }
}
