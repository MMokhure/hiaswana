<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Member;
use App\Models\Publication;
use App\Models\TeamMember;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'events'       => Event::count(),
            'team_members' => TeamMember::count(),
            'publications' => Publication::count(),
            'members'      => Member::count(),
            'pending'      => Member::where('status', 'pending')->count(),
        ];

        $latestMembers = Member::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestMembers'));
    }
}
