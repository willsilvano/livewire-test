<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Menu extends Component
{
    const KEY_MENU_COLLAPSED = 'menu-collapsed';
    public $isMenuCollapsed = false;

    public function mount()
    {
        $this->isMenuCollapsed = session(self::KEY_MENU_COLLAPSED, false);
    }

    public function collapseMenu()
    {
        $this->isMenuCollapsed = !$this->isMenuCollapsed;

        session([self::KEY_MENU_COLLAPSED => $this->isMenuCollapsed]);
    }

    public function render()
    {
        return view('livewire.admin.menu');
    }
}
