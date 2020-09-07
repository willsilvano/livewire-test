<?php

namespace App\Http\Livewire\Admin;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProfileForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $rules;

    public function mount()
    {
        $user = auth()->user();

        $this->fill([
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    protected function getRules()
    {
        return [
            'name' => 'required|min:6|max:255',
            'email' => [
                'required', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)
            ],
            'password' => 'confirmed|max:255'
        ];
    }

    public function updated($field)
    {
        $this->validateOnly($field, $this->getRules());
    }

    public function submit()
    {
        $user = User::find(auth()->user()->id);

        $validatedData  = $this->validate($this->getRules());

        $user->fill([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        if (isset($validatedData['password'])) {
            $user->fill([
                'password' => Hash::make($this->password),
            ]);
        }

        $user->save();

        session()->flash('success', 'Your data was successfully updated');

        return redirect(route('admin.profile'));
    }

    public function render()
    {
        return view('livewire.admin.profile-form');
    }
}
