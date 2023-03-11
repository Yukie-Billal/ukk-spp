<?php

namespace App\Http\Livewire\DataMaster\Petugas;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Petugas;

class PetugasCreate extends Component
{
    public $username;
    public $password;
    public $nama_petugas;
    public $no_telp;
    public $alamat;
    public $roleId;

    protected $listeners = [
        'setRole',
    ];

    public function setRole($value)
    {
        $this->roleId = $value;
    }

    public function store()
    {
        $password = Hash::make($this->password);

        $user = User::create([
            'username' => $this->username,
            'password' => $password,
            'role_id' => $this->roleId,
        ]);

        if ($user) {            
            $this->emit('toastify',['success','Data User Milik Petugas Berhasil Dibuat', 3000]);
            $petugas = Petugas::create([
                'nama_petugas' => $this->nama_petugas,
                'username' => $this->username,
                'password' => $password,
                'no_telp' => $this->no_telp,
                'alamat' => $this->alamat,
                'user_id' => $user->id,
            ]);
            $this->emit('swal',['success','Data Petugas Berhasil Dibuat', 3000]);
        }
    }
    public function render()
    {
        return view('livewire.data-master.petugas.petugas-create', [
            'roles' => Role::all(),
        ]);
    }
}
