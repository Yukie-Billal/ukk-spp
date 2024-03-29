<?php

namespace App\Http\Livewire\DataMaster;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Spp;
use Livewire\Component;
use App\Traits\ListenerTrait;
use Illuminate\Support\Facades\Hash;

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
    protected $validationAttributes = [
        'no_telp' => 'No Telephone',
        'kelas_id' => 'kelas',
        'spp_id' => 'spp'
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

    public function clear()
    {
        $this->nisn = '';
        $this->nis = '';
        $this->nama = '';
        $this->alamat = '';
        $this->no_telp = '';
    }

    public function store()
    {
        $this->validate();
        $siswa = Siswa::create([
            'nisn' => $this->nisn,
            'nis' => $this->nis,
            'password' => Hash::make($this->nis),
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'no_telp' => $this->no_telp,
            'kelas_id' => $this->kelas_id,
            'spp_id' => $this->spp_id,
        ]);
        if ($siswa) {
            $this->emit('swal', ['success', "Siswa $siswa->nama Berhasil Ditambahkan", 3000]);
            $this->clear();
        } else {
            $this->emit('toastify', ['danger', 'Gagal Menambah Data Siswa', 3000]);
        }
    }
    public function render()
    {
        $spp = Spp::orderBy('tahun', 'desc');
        $kelas = Kelas::orderBy('nama_kelas', 'asc');
        if ($this->kelas_id == null && $this->spp_id == null) {
            $this->kelas_id = Kelas::orderBy('nama_kelas', 'asc')->first()->id;
            $this->spp_id = Spp::orderBy('tahun', 'desc')->first()->id;
        }
        return view('livewire.data-master.siswa-create', [
            'kelases' => $kelas->get(),
            'spps' => $spp->get(),
        ]);
    }
}
