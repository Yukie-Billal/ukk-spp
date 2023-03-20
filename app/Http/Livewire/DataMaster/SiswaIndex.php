<?php

namespace App\Http\Livewire\DataMaster;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Traits\ListenerTrait;

class SiswaIndex extends Component
{
    use ListenerTrait;
    public $nisn;
    public $nis;
    public $nama;
    public $alamat;
    public $no_telp;
    public $kelas_id;
    public $search;
    protected $queryString = [
        'search' => ['except' => ''],
    ];
    protected $listeners = [
        'fresh','swal','toastify',
        'siswaDelete',
        'deleteSiswaPembayaran',
    ];

    public function getSiswa($siswa)
    {
        $this->emit('getSiswa', $siswa);
    }
    public function deleteConfirm($nisn)
    {
        $this->emit('swalConfirm',['question','Yakin Hapus Siswa ?', true, 'siswaDelete', $nisn]);
    }
    public function siswaDelete($nisn)
    {
        $cek = Pembayaran::where('nisn', $nisn);
        if ($cek->count() <= 0) {
            $siswa = Siswa::where('nisn', $nisn)->first();
            if ($siswa) {
                $siswa->delete();
                $this->emit('toastify', ['success', 'berhasil menghapus', 3000]);
            } else {
                $this->emit('toastify', ['danger', 'Siswa Tidak Ditemukan',3000]);
            }
        } else {
            $this->emit('swalConfirm', ['warning', 'Hapus Siswa beserta data pembayarannya ?', true, 'deleteSiswaPembayaran', $nisn]);
        }
    }
    public function deleteSiswaPembayaran($nisn)
    {
        $siswa = Siswa::find($nisn);
        if ($siswa) {            
            $pembayaran = Pembayaran::where('nisn', $nisn)->get();
            foreach ($pembayaran as $key => $item) {
                $item->delete();
            }
            $siswa->delete();
        }
    }

    public function render()
    {
        $siswa = Siswa::orderByDesc('nisn')->orderByDesc('nis');
        // dd($siswa->get()[0]->spp->tahun);
        if ($this->search != null) {
            $siswa->where('nisn', 'like', '%' . $this->search . '%')->orWhere('nis', 'like', '%' . $this->search . '%')->orWhere('nama', 'like', '%' . $this->search . '%'); //->orWhere('', 'like', '%' . $this->search . '%');
        }
        return view('livewire.data-master.siswa-index', [
            'siswas' => $siswa->get(),
        ]);
    }
}
