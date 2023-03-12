<?php

namespace App\Http\Livewire\DataMaster\Kelas;

use Livewire\Component;
use App\Models\Kelas;
use App\Traits\ListenerTrait;
use Illuminate\Support\Str;

class KelasCreate extends Component
{
    use ListenerTrait;
    
    public $nama_kelas;
    public $kompetensi_keahlian;

    protected $listeners = [
        'swal','fresh','toastify',
    ];

    protected $rules = [
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

    public function store()
    {
        $this->validate();
        $kelas = Kelas::create([
            'nama_kelas' => Str::upper($this->nama_kelas),
            'kompetensi_keahlian' => $this->kompetensi_keahlian,
        ]);
        
        if ($kelas) {
            $this->emit('swal',['success','Kelas Berhasil Dibuat', 3000]);            
            $this->nama_kelas = '';
            $this->kompetensi_keahlian = '';
        } else {
            $this->emit('swal',['error','Kelas Gagal Dibuat', 3000]);
        }
    }

    public function render()
    {
        return view('livewire.data-master.kelas.kelas-create');
    }
}
