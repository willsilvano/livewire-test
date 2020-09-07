<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;
    public $remember;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $authenticated = Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember);

        if (!$authenticated) {
            return $this->addError('email', 'Email or password incorrects.');
        }

        redirect(route('admin.home'));
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
