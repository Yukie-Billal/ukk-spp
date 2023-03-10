<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public $username;
    public $password;

    protected $rules = [
        'username' => 'required|min:3',
        'password' => 'required|min:3',
    ];

    protected $messages = [
        'username.required' => 'Username Wajib Di isi',
        'password.required' => 'Password Wajib Di isi',
        'username.min' => 'Username Minimal memiliki :min huruf',
        'password.min' => 'Password Minimal memiliki :min huruf',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function render()
    {
        return view('livewire.auth.login');
    }
}
