<?php

namespace App\Http\Livewire\DataMaster\Spp;

use App\Models\Spp;
use Livewire\Component;
use App\Traits\ListenerTrait;

use function PHPUnit\Framework\arrayHasKey;

class SppCreate extends Component
{
    use ListenerTrait;

    public $tahun;
    public $nominal;

    protected $listeners = [
        'fresh','toastify','swal',
        'setTahun'
    ];
    protected $rules = [
        'tahun' => 'required|numeric|min:4',
        'nominal' => 'required|numeric|min:5',
    ];
    protected $validationAttributes  = [
        'tahun' => 'Tahun',
        'nominal' => 'Nominal',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setTahun($value)
    {
        $this->tahun = $value;
    }

    public function store()
    {
        $this->validate();
        $spp = Spp::create([
            'tahun' => $this->tahun,
            'nominal' => $this->nominal,
        ]);        
        if ($spp) {
            $this->emit('toastify',['success','Berhasil Menambah Spp', 3000]);
            $this->tahun = '';
            $this->nominal = '';
        } else {
            $this->emit('toastify',['danger','Gagal Menambah Spp', 3000]);
        }
    }

    public function render()
    {
        if ($this->tahun == null) {
            $this->tahun = date('Y');
        }
        return view('livewire.data-master.spp.spp-create', [
            'spps' => Spp::orderByDesc('tahun')->get(),
        ]);
    }
}
