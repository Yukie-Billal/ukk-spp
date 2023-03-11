<?php

namespace App\Http\Livewire\DataMaster\Petugas;

use Livewire\Component;
use App\Models\Role;
use App\Models\Petugas;
use App\Models\User;

class PetugasEdit extends Component
{
    public $petugasId;
    // public $username;
    // public $password;
    public $nama_petugas;
    public $alamat;
    public $no_telp;
    public $role_id;

    protected $listeners = [
        'getPetugas',
    ];
    public function getPetuga($petugas)
    {
        $this->petugas_id = $petugas->petugas_id;
    }
    public function edit()
    {
        $petugas = Petugas::find($this->petugas_id);
        $petugas->update([            
                'nama_petugas' => $this->nama_petugas,
                // 'username' => $this->username,
                // 'password' => $password,
                'no_telp' => $this->no_telp,
                'alamat' => $this->alamat,
        ]);
    }
    public function render()
    {
        return view('livewire.data-master.petugas.petugas-edit', [
            'roles' => Role::orderByDesc('petugas_id')->get(),
        ]);
    }
}
