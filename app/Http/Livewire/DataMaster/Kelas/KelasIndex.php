<?php

namespace App\Http\Livewire\DataMaster\Kelas;

use App\Models\Kelas;
use Livewire\Component;
use App\Traits\ListenerTrait;

class KelasIndex extends Component
{
    use ListenerTrait;
    protected $listeners = [
        'swal','fresh','toastify',
        'deleteKelas',
    ];

    public function deleteKelas($id)
    {
        $kelas = Kelas::find($id);
        if ($kelas) {
            $kelas->delete();
            $this->emit('toastify',['success','Berhasil Menghapus Kelas', 3000]);
        } else {
            $this->emit('swal',['error','Kelas Tidak Ditemukan', 3000]);
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
        return view('livewire.data-master.kelas.kelas-index',[
            'kelases' => Kelas::orderByDesc('kompetensi_keahlian')->orderBy('nama_kelas', 'asc')->get(),
        ]);
    }
}
