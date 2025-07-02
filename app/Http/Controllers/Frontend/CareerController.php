<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $query = JobListing::active()->notExpired();
        
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        
        if ($request->location) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }
        
        if ($request->type) {
            $query->where('type', $request->type);
        }
        
        $jobs = $query->orderBy('created_at', 'desc')->paginate(6);
        
        return view('frontend.careers.index', compact('jobs'));
    }
    
    public function show($slug)
    {
        $job = JobListing::where('slug', $slug)->active()->notExpired()->firstOrFail();
        
        $relatedJobs = JobListing::active()
            ->notExpired()
            ->where('id', '!=', $job->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        
        return view('frontend.careers.show', compact('job', 'relatedJobs'));
    }
    
    public function showApplyForm($slug)
    {
        $job = JobListing::where('slug', $slug)->active()->notExpired()->firstOrFail();
        
        return view('frontend.careers.apply', compact('job'));
    }
    
    public function apply(Request $request, $slug)
    {
        $job = JobListing::where('slug', $slug)->active()->notExpired()->firstOrFail();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'cover_letter' => 'required|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'portfolio_url' => 'nullable|url'
        ]);
        
        $resumePath = $request->file('resume')->store('resumes', 'public');
        
        JobApplication::create([
            'job_listing_id' => $job->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'cover_letter' => $request->cover_letter,
            'resume_path' => $resumePath,
            'portfolio_url' => $request->portfolio_url,
        ]);
        
        return redirect()->route('careers.show', $job->slug)
            ->with('success', 'Lamaran Anda berhasil dikirim!');
    }
}
