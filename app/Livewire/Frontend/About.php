<?php

namespace App\Livewire\Frontend;

use App\Models\WebsiteSetting;
use Livewire\Attributes\Layout;
use Livewire\Component;

class About extends Component
{
    #[Layout('layouts.frontend')]
    public function render()
    {
        $settings = WebsiteSetting::first();

        return view('livewire.frontend.about', [
            'settings' => $settings,
        ]);
    }
}
