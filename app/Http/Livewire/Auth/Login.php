<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;


class Login extends Component
{
    public $email;
    public $password;

    // protected $rules = [
    //     'nisn' => 'required|numeric',
    //     'nis' => 'required|numeric',
    // ];
    protected $rules = [
        'email' => 'required',
        'password' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function loginact()
    {
        $data = $this->validate();
        // dd($data);

        
    }
    
    public function render()
    {
        return view('livewire.auth.login');
    }
}
