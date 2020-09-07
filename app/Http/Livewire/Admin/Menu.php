<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Menu extends Component
{
    const KEY_MENU_COLLAPSED = 'menu-collapsed';
    public $isMenuCollapsed = false;
    public $currentRoute;

    public function mount($currentRoute)
    {
        $this->currentRoute = $currentRoute;
        $this->isMenuCollapsed = session(self::KEY_MENU_COLLAPSED, false);
    }

    public function collapseMenu()
    {
        $this->isMenuCollapsed = !$this->isMenuCollapsed;

        session([self::KEY_MENU_COLLAPSED => $this->isMenuCollapsed]);
    }

    public function isCurrentRoute($routeName)
    {
        return \Illuminate\Support\Str::is($routeName, $this->currentRoute);
    }

    public function render()
    {
        return view('livewire.admin.menu');
    }
}
