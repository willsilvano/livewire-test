<?php

namespace App\Http\Livewire\Admin;

use App\Notifications\TestNotification;
use Livewire\Component;

class Notification extends Component
{
    public $lastNotifications = [];
    public $totalNotifications;

    public function mount()
    {
        $this->getNotifications();
    }

    public function getNotifications()
    {
        $user = auth()->user();

        $this->totalNotifications = $user->unreadNotifications->count();
        $this->lastNotifications = $user->unreadNotifications()->orderBy('created_at', 'desc')->limit(3)->get();
    }

    public function newNotification()
    {
        $user = auth()->user();
        $user->notify(new TestNotification('Olá!!!!'));
    }

    public function render()
    {
        return view('livewire.admin.notification');
    }
}
