<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public $username;
    public $password;
    public $role = 'siswa';
    
    protected $rules = [
        'username' => 'required|min:3',
        'password' => 'required|min:3',
    ];

    public function setRole($value)
    {
        $this->role = $value;
        $this->render();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function render()
    {
        return view('livewire.auth.login');
    }
}
