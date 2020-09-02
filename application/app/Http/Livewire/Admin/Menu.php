<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Menu extends Component
{

    // TODO
    public $menuItems = [];

    public function render()
    {
        return view('livewire.admin.menu');
    }
}
