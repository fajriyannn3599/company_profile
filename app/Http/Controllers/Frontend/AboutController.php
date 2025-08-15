<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Story;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $teams = Team::active()->orderBy('sort_order')->get();
        $stories = Story::active()->orderBy('sort_order')->get();

        return view('frontend.about', compact('teams', 'stories'));
    }

    public function teamDetail($id)
    {
        $team = Team::findOrFail($id);

        // Get other team members (exclude current team member)
        $otherTeamMembers = Team::active()
            ->where('id', '!=', $id)
            ->orderBy('sort_order')
            ->limit(8)
            ->get();

        return view('frontend.team-detail', compact('team', 'otherTeamMembers'));
    }



}
