<?php

namespace App\Livewire\Frontend;

use App\Models\PageHeader;
use App\Models\Partner;
use App\Models\WebsiteSetting;
use Livewire\Attributes\Layout;
use Livewire\Component;

class About extends Component
{
    #[Layout('layouts.frontend')]
    public function render()
    {
        $header = PageHeader::where('page_key', 'about')->first();
        $settings = WebsiteSetting::first();
        $partners = Partner::where('is_active', true)->orderBy('sort_order')->get();

        return view('livewire.frontend.about', [
            'header' => $header,
            'settings' => $settings,
            'partners' => $partners,
        ]);
    }
}
