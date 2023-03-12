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
        'tahun' => 'required|numeric|min:4',
        'nominal' => 'required|numeric|min:5',
    ];
    protected $messages = [
        'tahun.required' => 'Tahun Spp Wajib Di isi',
        'tahun.numeric' => 'Tahun Spp Harus berisi angka',
        'tahun.min' => 'Tahun Spp Memiliki minimal :min huruf',
        'nominal.required' => 'Nominal Pembayaran Spp Wajib Di isi',
        'nominal.numeric' => 'Nominal Pembayaran Spp Harus berisi angka',
        'nominal.min' => 'Nominal Pembayaran Spp Memiliki minimal :min huruf',
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
