<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Article;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredServices = Service::active()->featured()->orderBy('sort_order')->take(6)->get();
        $featuredProjects = Project::active()->featured()->orderBy('sort_order')->take(6)->get();
        $testimonials = Testimonial::active()->featured()->orderBy('sort_order')->take(3)->get();
        $latestArticles = Article::published()->orderBy('published_at', 'desc')->take(3)->get();
        $whyChooseUs = WhyChooseUs::active()->orderBy('sort_order')->take(6)->get();
        
        return view('frontend.home', compact(
            'featuredServices',
            'featuredProjects', 
            'testimonials',
            'latestArticles',
            'whyChooseUs'
        ));
    }
}
