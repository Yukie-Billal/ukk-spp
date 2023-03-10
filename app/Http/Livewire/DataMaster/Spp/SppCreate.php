<?php

namespace App\Http\Livewire\DataMaster\Spp;

use App\Models\Spp;
use Livewire\Component;
use App\Traits\ListenerTrait;

class SppCreate extends Component
{
    use ListenerTrait;
    public $tahun;
    public $nominal;

    protected $listeners = [
        'fresh','toastify','swal',
    ];

    public function store()
    {
        $spp = Spp::create([
            'tahun' => $this->tahun,
            'nominal' => $this->nominal,
        ]);
        if ($spp) {
            $this->emit('toastify',['success','Berhasil Menambah Spp', 3000]);
        } else {
            $this->emit('toastify',['danger','Gagal Menambah Spp', 3000]);
        }
    }

    public function render()
    {
        return view('livewire.data-master.spp.spp-create');
    }
}
