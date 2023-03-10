<?php

namespace App\Http\Livewire\DataMaster\Spp;

use App\Models\Spp;
use Livewire\Component;

class SppIndex extends Component
{
    protected $listeners = [
        'sppDelete',
    ];

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
        return view('livewire.data-master.spp.spp-index', [
            'spps' => Spp::all(),
        ]);
    }
}
