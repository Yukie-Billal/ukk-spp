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
    protected $rules = [
        // 'username' => 'required|min:3',
        // 'password' => 'required|min:3',
        'nama_petugas' => 'required|min:4',
        'no_telp' => 'required|min:3',
        'alamat' => 'required|min:3',
        'role_id' => 'required|numeric',
    ];
    protected $messages = [
        // 'username.required' => ':attribute Harus Di isi', 
        // 'password.required' => ':attribute Harus Di isi', 
        'nama_petugas.required' => ':attribute Harus Di isi', 
        'no_telp.required' => ':attribute Harus Di isi', 
        'alamat.required' => ':attribute Harus Di isi', 
        'role_id.required' => ':attribute Harus Di isi', 
    ];
    protected $attribute = [
        // 'username' => 'Username',
        // 'password' => 'Password',
        'nama_petugas' => 'Nama Petugas',
        'no_telp' => 'No Telephone',
        'alamat' => 'Alamat',
        'role_id' => 'Role',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
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
        $this->validate();
        $petugas = Petugas::find($this->petugas_id);
        $petugas->update([
                'nama_petugas' => $this->nama_petugas,
                'no_telp' => $this->no_telp,
                'alamat' => $this->alamat,
        ]);
        if ($petugas) {
            $this->clear();
        }
        $this->emit('toastify', ['success', 'Petugas Berhasil Diubah', 3000]);
    }
    public function render()
    {
        return view('livewire.data-master.petugas.petugas-edit', [
            'roles' => Role::orderByDesc('id')->get(),
        ]);
    }
}
