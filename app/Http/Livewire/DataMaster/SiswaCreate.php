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

    protected $messages = [
        'nisn.required' => 'NISN wajib di isi',
        'nis.required' => 'NIS wajib di isi',
        'nama.required' => 'Nama wajib di isi',
        'no_telp.required' => 'No Telephone wajib di isi',
        'alamat.required' => 'Alamat wajib di isi',
        'kelas_id.required' => 'Kelas wajib di isi',
        'spp_id.required' => 'Tahun Spp wajib di isi',
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
            'password' => $this->nis,
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
        $this->kelas_id = Kelas::orderBy('nama_kelas', 'asc')->first()->id;
        $this->spp_id = Spp::orderBy('tahun', 'asc')->first()->id;
        return view('livewire.data-master.siswa-create', [
            'kelases' => Kelas::orderBy('nama_kelas','asc')->get(),
            'spps' => Spp::orderBy('tahun', 'asc')->get(),
        ]);
    }
}
