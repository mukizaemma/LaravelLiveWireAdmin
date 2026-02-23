<?php

namespace App\Livewire\Admin;

use App\Models\ClinicalDepartment;
use App\Models\CustomerFeedback;
use App\Models\LeadershipTeamMember;
use App\Models\Partner;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Dashboard extends Component
{
    public function render()
    {
        $doctorCount = User::where('role', 'clinical_staff')->count();
        $leadershipCount = LeadershipTeamMember::count();
        $departmentCount = ClinicalDepartment::count();
        $partnerCount = Partner::count();
        $feedbackCount = CustomerFeedback::count();
        $approvedFeedbackCount = CustomerFeedback::where('is_approved', true)->count();

        $feedbackStats = CustomerFeedback::selectRaw(
            'rating_category, COUNT(*) as total, AVG(rating_out_of_10) as avg_rating'
        )
            ->groupBy('rating_category')
            ->get();

        return view('livewire.admin.dashboard', [
            'doctorCount' => $doctorCount,
            'leadershipCount' => $leadershipCount,
            'departmentCount' => $departmentCount,
            'partnerCount' => $partnerCount,
            'feedbackCount' => $feedbackCount,
            'approvedFeedbackCount' => $approvedFeedbackCount,
            'feedbackStats' => $feedbackStats,
        ]);
    }
}
