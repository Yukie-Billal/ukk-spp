<?php

namespace App\Http\Livewire\DataMaster\Kelas;

use App\Models\Kelas;
use App\Models\Siswa as ModelsSiswa;
use Livewire\Component;
use App\Traits\ListenerTrait;
use Illuminate\Http\Request;

class KelasIndex extends Component
{
    use ListenerTrait;
    public $search;
    protected $queryString = [
        'search' => ['except' => '']
    ];

    protected $listeners = [
        'swal','fresh','toastify',
        'deleteKelas',
    ];

    public function deleteKelas($id)
    {
        $siswa = ModelsSiswa::where('kelas_id', $id);
        if ($siswa->count() <= 0) {
            $kelas = Kelas::find($id);
            if ($kelas) {
                $kelas->delete();
                $this->emit('toastify',['success','Berhasil Menghapus Kelas', 3000]);
            } else {
                $this->emit('swal',['error','Kelas Tidak Ditemukan', 3000]);
            }
        } else {
            $this->emit('toastify', ['danger', 'Tidak Bisa Menghapus Kelas', 3000]);
            $this->emit('toastify', ['danger', 'Terdapat Siswa yang terhubung pada kelas', 3000]);
        }
    }

    public function confirmDelete($id)
    {
        $this->emit('swalConfirm',['question','Yakin Hapus kelas ?',true,'deleteKelas',$id]);
    }

    public function getKelas($id)
    {
        $this->emit('getKelas',$id);
    }

    public function render()
    {
        $kelas = Kelas::orderByDesc('kompetensi_keahlian')->orderBy('nama_kelas', 'asc');

        if ($this->search != null) {
            $kelas->where('nama_kelas', 'like', '%' . $this->search . '%')->orWhere('kompetensi_keahlian', 'like', '%' . $this->search . '%');
        }
        return view('livewire.data-master.kelas.kelas-index',[
            'kelases' => $kelas->get(),
        ]);
    }
}
