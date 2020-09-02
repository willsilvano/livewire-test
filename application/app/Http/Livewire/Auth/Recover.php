<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Recover extends Component
{
    public $email;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'email' => 'email',
        ]);
    }

    public function submit()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        session()->flash('success', '...');

        return redirect(route('auth.login'));
    }

    public function render()
    {
        return view('livewire.auth.recover');
    }
}
