<?php

namespace App\Http\Livewire\DataMaster;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Livewire\Component;
use App\Traits\ListenerTrait;

class SiswaEdit extends Component
{
    use ListenerTrait;

    public $nisnAwal;
    public $nisn;
    public $nis;
    public $nama;
    public $no_telp;
    public $alamat;
    public $kelas_id;
    public $spp_id;

    protected $listeners = [
        'toastify','fresh','swal',
        'getSiswa',
        'setKelas','setSpp'
    ];
    public function setKelas($value)
    {
        dd($value);
        $this->kelas_id = $value;
    }
    public function setSpp($value)
    {
        $this->spp_id = $value;
    }

    protected $rules = [
        'nisn' => 'required',
        'nis' => 'required',
        'nama' => 'required',
        'no_telp' => 'required',
        'alamat' => 'required',
        'kelas_id' => 'required',
        'spp_id' => 'required',
    ];

    public function clear()
    {
        $this->nisnAwal = '';
        $this->nisn = '';
        $this->nis = '';
        $this->nama = '';
        $this->alamat = '';
        $this->no_telp = '';
    }

    public function getSiswa($siswa)
    {
        $this->nisnAwal = $siswa['nisn'];
        $this->nisn = $siswa['nisn'];
        $this->nis = $siswa['nis'];
        $this->nama = $siswa['nama'];
        $this->alamat = $siswa['alamat'];
        $this->no_telp = $siswa['no_telp'];
        $this->kelas_id = $siswa['kelas_id'];
        $this->spp_id = $siswa['spp_id'];
    }

    public function updateSiswa()
    {
        $this->validate();
        dd($this->kelas_id);
        $siswa = Siswa::find($this->nisnAwal);
        $siswa->update([
            'nisn' => $this->nisn,
            'nis' => $this->nis,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'no_telp' => $this->no_telp,
            'kelas_id' => $this->kelas_id,
            'spp_id' => $this->spp_id,
        ]);

        if ($siswa) {
            $this->nisnAwal = $this->nisn;
            $this->emit('swal', ['success', "Siswa Berhasil Diubah", 3000]);
            $this->clear();
        } else {
            $this->emit('swal', ['error', "Siswa $this->nama Gagal Diubah", 3000]);
        }
    }

    public function render()
    {
        return view('livewire.data-master.siswa-edit', [
            'kelases' => Kelas::orderByDesc('nama_kelas')->get(),
            'spps' => Spp::orderBy('tahun', 'asc')->get(),
        ]);
    }
}
