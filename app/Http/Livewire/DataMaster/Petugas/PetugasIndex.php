<?php

namespace App\Http\Livewire\DataMaster\Petugas;

use Livewire\Component;
use App\Models\Petugas;
use App\Traits\ListenerTrait;

class PetugasIndex extends Component
{
    use ListenerTrait;
    protected $listeners = [
        'toastify','fresh','swal',
        'deletePetugas',
    ];
    public function deletePetugas($id)
    {
        $petugas = Petugas::find($id);
        if ($petugas) {
            $petugas->delete();
            $petugas->user->delete();
            $this->emit('toastify',['success','Berhasil Menghapus Petugas', 3000]);
        } else {
            $this->emit('toastify',['success','Berhasil Menghapus Petugas', 3000]);            
        }
    }
    public function deleteConfirm($id)
    {
        $this->emit('swalConfirm', ['question','Hapus Petugas ?',true,'deletePetugas',$id]);
    }
    public function getPetugas($id)
    {        
        $this->emit('getPetugas',$id);
    }
    public function render()
    {
        return view('livewire.data-master.petugas.petugas-index', [
            'petugases' => Petugas::all(),
        ]);
    }
}
