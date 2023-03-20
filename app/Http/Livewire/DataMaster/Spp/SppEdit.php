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
    protected $rules = [
        'tahun' => 'required|unique:spp,tahun|numeric|min:4',
        'nominal' => 'required|numeric|min:5',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function getSpp($spp)
    {
        $this->sppId = $spp['id'];
        $this->tahun = $spp['tahun'];
        $this->nominal = $spp['nominal'];
    }

    public function edit()
    {
        $this->validate();
        $cek = Spp::where('tahun', $this->tahun)->count();
        if ($cek <= 0) {
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
        } else {
            $this->emit('toastify',['danger','Tahun Sudah Digunakan', 3000]);
        }
    }
    
    public function render()
    {
        return view('livewire.data-master.spp.spp-edit');
    }
}
