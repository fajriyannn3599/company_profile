<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $categories = ProjectCategory::active()->orderBy('sort_order')->get();
        $query = Project::active()->with('category');
        
        if ($request->category) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        
        $projects = $query->orderBy('sort_order')->paginate(12);
        
        return view('frontend.projects.index', compact('projects', 'categories'));
    }
    
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedProjects = Project::active()
            ->where('project_category_id', $project->project_category_id)
            ->where('id', '!=', $project->id)
            ->orderBy('sort_order')
            ->take(3)
            ->get();
            
        return view('frontend.projects.show', compact('project', 'relatedProjects'));
    }
}
