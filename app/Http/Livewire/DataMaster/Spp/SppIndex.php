<?php

namespace App\Http\Livewire\DataMaster\Spp;

use App\Models\Spp;
use Livewire\Component;
use App\Traits\ListenerTrait;

class SppIndex extends Component
{
    use ListenerTrait;

    public $search;
    protected $queryString = [
        'search' => ['except' => '']
    ];

    protected $listeners = [
        'swal','fresh','toastify',
        'sppDelete',
    ];

    public function confirmDelete($id)
    {
        $this->emit('swalConfirm', ['question','Yakin untuk Menghapus ?', true, 'sppDelete', $id]);
    }

    public function sppDelete($id)
    {
        $spp = Spp::find($id);
        if ($spp) {
            $spp->delete();
            $this->emit('toastify', ['success','Berhasil Menghapus Spp']);
        } else {
            $this->emit('toastify', ['success','Berhasil Menghapus Spp']);
        }
    }

    public function getSpp($spp)
    {
        $this->emit('getSpp', $spp);
    }

    public function render()
    {
        $spp = Spp::orderByDesc('tahun');
        if ($this->search != null) {
            $spp->where('tahun', 'like', '%' . $this->search . '%')->orWhere('nominal', 'like', '%' . $this->search . '%');
        }
        return view('livewire.data-master.spp.spp-index', [
            'spps' => $spp->get(),
        ]);
    }
}
