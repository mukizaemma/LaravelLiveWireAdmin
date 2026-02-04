<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;

#[Layout('layouts.admin')]
class Settings extends Component
{
    #[Url(as: 'tab', keep: true)]
    public $activeTab = 'about';

    public function mount()
    {
        // Validate tab parameter
        $validTabs = ['about', 'site-info', 'terms'];
        if (!in_array($this->activeTab, $validTabs)) {
            $this->activeTab = 'about';
        }
    }

    public function setTab($tab)
    {
        $validTabs = ['about', 'site-info', 'terms'];
        if (in_array($tab, $validTabs)) {
            $this->activeTab = $tab;
        }
    }

    public function render()
    {
        return view('livewire.admin.settings');
    }
}
