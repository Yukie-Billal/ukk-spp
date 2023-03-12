<?php

namespace App\Http\Livewire\DataMaster\Petugas;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
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

    protected $rules = [
        'username' => 'required|min:3',
        'password' => 'required|min:3',
        'nama_petugas' => 'required|min:4',
        'no_telp' => 'required|min:3',
        'alamat' => 'required|min:3',
        'roleId' => 'required|numeric',
    ];
    protected $messages = [
        'username.required' => ':attribute Harus Di isi', 
        'password.required' => ':attribute Harus Di isi', 
        'nama_petugas.required' => ':attribute Harus Di isi', 
        'no_telp.required' => ':attribute Harus Di isi', 
        'alamat.required' => ':attribute Harus Di isi', 
        'roleId.required' => ':attribute Harus Di isi', 
    ];
    protected $attribute = [
        'username' => 'Username',
        'password' => 'Password',
        'nama_petugas' => 'Nama Petugas',
        'no_telp' => 'No Telephone',
        'alamat' => 'Alamat',
        'roleId' => 'Role',
    ];
    public function clear()
    {
        $this->nama_petugas = '';
        $this->username = '';
        $this->password = '';
        $this->no_telp = '';
        $this->alamat = '';
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function setRole($value)
    {
        $this->roleId = $value;
    }

    public function store()
    {
        $this->validate();
        $password = Hash::make($this->password);

        $petugas = Petugas::create([
            'nama_petugas' => $this->nama_petugas,
            'username' => $this->username,
            'password' => $password,
            'no_telp' => $this->no_telp,
            'alamat' => $this->alamat,
            'role_id' => $this->roleId,
        ]);
        if ($petugas) {
            $this->emit('swal',['success','Data Petugas Berhasil Dibuat', 3000]);
            $this->clear();
        } else {
            $this->emit('swal',['error','Terjadi Kesalahan', 3000]);
        }
    }
    public function render()
    {
        return view('livewire.data-master.petugas.petugas-create', [
            'roles' => Role::orderByDesc('nama_role')->get(),
        ]);
    }
}
