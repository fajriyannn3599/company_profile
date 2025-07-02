<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::with('jobListing')->latest()->paginate(10);
        
        // Get stats for dashboard
        $stats = [
            'total' => JobApplication::count(),
            'pending' => JobApplication::where('status', 'pending')->count(),
            'reviewed' => JobApplication::where('status', 'reviewed')->count(),
            'thisMonth' => JobApplication::where('created_at', '>=', now()->startOfMonth())->count(),
        ];
        
        return view('admin.job-applications.index', compact('applications', 'stats'));
    }

    public function show(JobApplication $jobApplication)
    {
        $jobApplication->load('jobListing');
        return view('admin.job-applications.show', compact('jobApplication'));
    }

    public function destroy(JobApplication $jobApplication)
    {
        $jobApplication->delete();

        return redirect()->route('admin.job-applications.index')->with('success', 'Lamaran pekerjaan berhasil dihapus!');
    }
}
