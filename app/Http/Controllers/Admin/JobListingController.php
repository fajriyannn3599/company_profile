<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobListingController extends Controller
{
    public function index()
    {
        $jobs = JobListing::withCount('applications')->latest()->paginate(10);
        
        // Get stats for dashboard
        $stats = [
            'total' => JobListing::count(),
            'active' => JobListing::where('is_active', true)->count(),
            'inactive' => JobListing::where('is_active', false)->count(),
            'thisMonth' => JobListing::where('created_at', '>=', now()->startOfMonth())->count(),
        ];
        
        return view('admin.jobs.index', compact('jobs', 'stats'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:job_listings',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'type' => 'required|in:full-time,part-time,contract,internship',
            'level' => 'required|in:entry,junior,mid,senior,lead',
            'department' => 'required|string|max:255',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'salary_range' => 'nullable|string|max:255',
            'requirements' => 'required|string',
            'responsibilities' => 'required|string',
            'benefits' => 'required|string',
            'deadline' => 'nullable|date|after:today',
            'is_active' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['is_active'] = $request->has('is_active');

        // Convert requirements, responsibilities, and benefits to arrays
        $validated['requirements'] = array_filter(array_map('trim', explode("\n", $validated['requirements'])));
        $validated['responsibilities'] = array_filter(array_map('trim', explode("\n", $validated['responsibilities'])));
        $validated['benefits'] = array_filter(array_map('trim', explode("\n", $validated['benefits'])));

        JobListing::create($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Lowongan pekerjaan berhasil ditambahkan!');
    }

    public function show(JobListing $job)
    {
        $job->load('applications');
        return view('admin.jobs.show', compact('job'));
    }

    public function edit(JobListing $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, JobListing $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:job_listings,slug,' . $job->id,
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'type' => 'required|in:full-time,part-time,contract,internship',
            'level' => 'required|in:entry,junior,mid,senior,lead',
            'department' => 'required|string|max:255',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'salary_range' => 'nullable|string|max:255',
            'requirements' => 'required|string',
            'responsibilities' => 'required|string',
            'benefits' => 'required|string',
            'deadline' => 'nullable|date|after:today',
            'is_active' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['is_active'] = $request->has('is_active');

        // Convert requirements, responsibilities, and benefits to arrays
        $validated['requirements'] = array_filter(array_map('trim', explode("\n", $validated['requirements'])));
        $validated['responsibilities'] = array_filter(array_map('trim', explode("\n", $validated['responsibilities'])));
        $validated['benefits'] = array_filter(array_map('trim', explode("\n", $validated['benefits'])));

        $job->update($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Lowongan pekerjaan berhasil diperbarui!');
    }

    public function destroy(JobListing $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Lowongan pekerjaan berhasil dihapus!');
    }
}
