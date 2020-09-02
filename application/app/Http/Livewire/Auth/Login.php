<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'email' => 'email'
        ]);
    }

    public function submit()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $authenticated = Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember);

        if (!$authenticated) {
            return $this->addError('email', 'Email or password incorrects.');
        }

        redirect(route('admin.home'));
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
