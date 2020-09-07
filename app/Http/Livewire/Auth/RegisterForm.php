<?php

namespace App\Http\Livewire\Auth;

use App\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|min:6|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed|max:255'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Account successfully created');

        return redirect(route('auth.login'));
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
