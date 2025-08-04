<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Article;
use App\Models\WhyChooseUs;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredServices = Service::active()->featured()->orderBy('sort_order')->take(6)->get();
        $featuredProjects = Project::active()->featured()->orderBy('sort_order')->take(6)->get();
        $testimonials = Testimonial::active()->featured()->orderBy('sort_order')->take(3)->get();
        $latestArticles = Article::published()->orderBy('created_at', 'desc')->take(4)->get();
        $whyChooseUs = WhyChooseUs::active()->orderBy('sort_order')->take(6)->get();
        $service_categories = ServiceCategory::withCount('services')->orderBy('sort_order')->get();
        
        
        return view('frontend.home', compact(
            'featuredServices',
            'featuredProjects', 
            'testimonials',
            'latestArticles',
            'whyChooseUs',
            'service_categories'
        ));
    }
}
