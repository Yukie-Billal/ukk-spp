<?php

namespace App\Http\Livewire\DataMaster\Kelas;

use Livewire\Component;
use App\Models\Kelas;
use App\Traits\ListenerTrait;

class KelasCreate extends Component
{
    use ListenerTrait;
    public $nama_kelas;
    public $kompetensi_keahlian;

    protected $listeners = [
        'swal','fresh','toastify',
    ];

    public function store()
    {
        $kelas = Kelas::create([
            'nama_kelas' => $this->nama_kelas,
            'kompetensi_keahlian' => $this->kompetensi_keahlian,
        ]);
        
        if ($kelas) {
            $this->emit('swal',['success','Kelas Berhasil Dibuat', 3000]);            
        } else {
            $this->emit('swal',['error','Kelas Gagal Dibuat', 3000]);
        }
    }

    public function render()
    {
        return view('livewire.data-master.kelas.kelas-create');
    }
}
