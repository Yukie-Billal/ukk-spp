<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $siswa = false;
    public $petugas = false;

    public function render()
    {
        if (Auth::guard('siswa')->check()) {
            $this->siswa = true;
            $this->petugas = false;
        } else if (Auth::guard('petugas')->check()) {
            $this->siswa = false;            
            $this->petugas = true;
        }else{
            return abort(401);
        }
        
        return view('livewire.auth.profile');
    }
}
