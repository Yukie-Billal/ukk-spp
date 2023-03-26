<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FotoProfileUbah extends Component
{
    use WithFileUploads;

    public $foto;

    public function render()
    {
        return view('livewire.foto-profile-ubah');
    }
}
