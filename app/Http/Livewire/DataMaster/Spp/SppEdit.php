<?php

namespace App\Http\Livewire\DataMaster\Spp;

use App\Models\Spp;
use Livewire\Component;

class SppEdit extends Component
{
    public $sppId;
    public $tahun;
    public $nominal;

    protected $listeners = [
        'getSpp',
    ];

    public function getSpp($spp)
    {
        $this->sppId = $spp['id'];
        $this->tahun = $spp['tahun'];
        $this->nominal = $spp['nominal'];
    }

    public function edit()
    {
        $spp = Spp::find($this->sppId);
        if ($spp) {
            $spp->update([
                'tahun' => $this->tahun,
                'nominal' => $this->nominal
            ]);
            $this->emit('toastify',['success','Berhasil Mengubah Spp', 3000]);
        } else {
            $this->emit('toastify',['danger','Gagal Mengubah Spp', 3000]);
        }
    }
    
    public function render()
    {
        return view('livewire.data-master.spp.spp-edit');
    }
}
