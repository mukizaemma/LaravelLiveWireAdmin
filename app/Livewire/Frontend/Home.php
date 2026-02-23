<?php

namespace App\Livewire\Frontend;

use App\Models\ClinicalDepartment;
use App\Models\LeadershipTeamMember;
use App\Models\HomeSlider;
use App\Models\Partner;
use App\Models\WebsiteSetting;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{
    #[Layout('layouts.frontend')]
    public function render()
    {
        $settings = WebsiteSetting::first();
        $sliders = HomeSlider::where('is_active', true)->orderBy('sort_order')->get();
        $departments = ClinicalDepartment::where('is_active', true)->orderBy('sort_order')->get();
        $leadership = LeadershipTeamMember::where('is_active', true)->orderBy('sort_order')->get();
        $partners = Partner::where('is_active', true)->orderBy('sort_order')->get();

        return view('livewire.frontend.home', [
            'settings' => $settings,
            'sliders' => $sliders,
            'departments' => $departments,
            'leadership' => $leadership,
            'partners' => $partners,
        ]);
    }
}
