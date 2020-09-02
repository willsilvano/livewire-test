<?php

namespace App\Http\Livewire\Auth;

use App\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'min:6|max:255',
            'email' => 'email|max:255|unique:users',
            'password' => 'confirmed|max:255',
        ]);
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|min:6|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|max:255'
        ]);

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
        return view('livewire.auth.register');
    }
}
