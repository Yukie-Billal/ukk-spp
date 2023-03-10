<?php

namespace App\Http\Livewire\DataMaster;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Spp;
use Livewire\Component;
use App\Traits\ListenerTrait;

class SiswaCreate extends Component
{
    use ListenerTrait;
    public $nisn;
    public $nis;
    public $nama;
    public $no_telp;
    public $alamat;
    public $kelas_id;
    public $spp_id;
    
    protected $listeners = [
        'fresh','toastify','swal',
        'setKelas','setSpp'
    ];

    protected $rules = [
        'nisn' => 'required',
        'nis' => 'required',
        'nama' => 'required',
        'no_telp' => 'required',
        'alamat' => 'required',
        'kelas_id' => 'required',
        'spp_id' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setKelas($value)
    {
        $this->kelas_id = $value;
    }
    public function setSpp($value)
    {
        $this->spp_id = $value;
    }

    public function store()
    {
        $this->validate();

        $user = User::create([
            'username' => $this->nisn,
            'password' => $this->nis,
            'role_id' => 3,
        ]);

        $siswa = Siswa::create([
            'nisn' => $this->nisn,
            'nis' => $this->nis,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'no_telp' => $this->no_telp,
            'kelas_id' => $this->kelas_id,
            'spp_id' => $this->spp_id,
            'user_id' => $user->id,
        ]);
        if ($siswa) {
            $this->emit('toastify', ['success', "Siswa $siswa->nama Berhasil Ditambahkan", 3000]);
        } else {
            $this->emit('toastify', ['danger', 'Gagal Menambah Data', 3000]);
        }
    }
    public function render()
    {
        return view('livewire.data-master.siswa-create', [
            'kelases' => Kelas::orderByDesc('nama_kelas')->get(),
            'spps' => Spp::orderBy('tahun', 'asc')->get(),
        ]);
    }
}
