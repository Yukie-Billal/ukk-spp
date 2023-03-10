<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Test extends Component
{
    public $nama;

    public function updatedNama($value)
    {
        $value = Str::lower($value);
        $this->nama = $value;
    }
    
    public function setNama()
    {
        $this->nama = 'Yukie M Billal';    
    }

    public function render()
    {
        return view('livewire.test');
    }
}