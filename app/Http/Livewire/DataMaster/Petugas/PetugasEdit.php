<?php

namespace App\Http\Livewire\DataMaster\Petugas;

use Livewire\Component;
use App\Models\Role;
use App\Models\Petugas;
use App\Models\User;

class PetugasEdit extends Component
{
    public $petugas_id;
    // public $username;
    // public $password;
    public $nama_petugas;
    public $alamat;
    public $no_telp;
    public $role_id;

    protected $listeners = [
        'getPetugas',
    ];
    public function clear()
    {
        $this->petugas_id = '';
        $this->nama_petugas = '';
        $this->alamat = '';
        $this->no_telp = '';
        $this->role_id = '';
    }
    public function getPetugas($id)
    {        
        $petugas = Petugas::find($id);
        $this->petugas_id = $petugas->petugas_id;
        $this->nama_petugas = $petugas->nama_petugas;
        $this->alamat = $petugas->alamat;
        $this->no_telp = $petugas->no_telp;
        $this->role_id = $petugas->user->role_id;
    }
    public function edit()
    {
        $petugas = Petugas::find($this->petugas_id);
        $petugas->update([
                'nama_petugas' => $this->nama_petugas,
                'no_telp' => $this->no_telp,
                'alamat' => $this->alamat,
        ]);
        $this->clear();
        $this->emit('toastify', ['success', 'Petugas Berhasil Diubah', 3000]);
    }
    public function render()
    {
        return view('livewire.data-master.petugas.petugas-edit', [
            'roles' => Role::orderByDesc('id')->get(),
        ]);
    }
}
