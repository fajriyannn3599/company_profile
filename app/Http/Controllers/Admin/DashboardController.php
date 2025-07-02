<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Project;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Message;
use App\Models\JobApplication;
use App\Models\JobListing;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Get statistics for dashboard
        $stats = [
            'services' => Service::count(),
            'projects' => Project::count(),
            'articles' => Article::count(),
            'teams' => Team::count(),
            'testimonials' => Testimonial::count(),
            'messages' => Message::where('is_read', false)->count(),
            'job_applications' => JobApplication::count(),
            'active_jobs' => JobListing::where('is_active', true)->count(),
        ];

        // Get recent data
        $recent = [
            'messages' => Message::latest()->take(5)->get(),
            'job_applications' => JobApplication::with('jobListing')->latest()->take(5)->get(),
            'articles' => Article::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats', 'recent'));
    }
}
