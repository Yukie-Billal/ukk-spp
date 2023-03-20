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
    public $tahunType = false;
    protected $listeners = [
        'fresh','toastify','swal',
        'setTahun',
    ];
    protected $rules = [
        'tahun' => 'required|unique:spp,tahun|numeric|min:5',
        'nominal' => 'required|numeric|min:5',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setTahun($value)
    {
        if ($value == 'type') {
            $this->tahunType = true;   
        } else {
            $this->tahun = $value;
        }
    }

    public function store()
    {
        $this->validate();

        $cek = Spp::where('tahun',$this->tahun)->count();
        if ($cek <= 0) {            
            $spp = Spp::create([
                'tahun' => $this->tahun,
                'nominal' => $this->nominal,
            ]);        
            if ($spp) {
                $this->emit('toastify',['success','Berhasil Menambah Spp', 3000]);
                $this->tahun = '';
                $this->nominal = '';
                $this->tahunType = false;
            } else {
                $this->emit('toastify',['danger','Gagal Menambah Spp', 3000]);
            }
        } else {
            $this->emit('toastify', ['danger', 'Tahun Spp Tersedia', 3000]);
        }
    }

    public function render()
    {
        if ($this->tahun == null && $this->tahunType == false) {
            $this->tahun = date('Y');
        }
        if ($this->tahun <= 0) {
            $this->tahun = 1;
        }
        if ($this->nominal <= 0) {
            $this->nominal = 1;
        }
        return view('livewire.data-master.spp.spp-create', [
            'spps' => Spp::orderByDesc('tahun')->get(),
        ]);
    }
}
