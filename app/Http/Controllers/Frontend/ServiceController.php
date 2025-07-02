<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->orderBy('sort_order')->paginate(12);
        $whyChooseUs = WhyChooseUs::active()->ordered()->get();
        
        return view('frontend.services.index', compact('services', 'whyChooseUs'));
    }
    
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedServices = Service::active()
            ->where('id', '!=', $service->id)
            ->orderBy('sort_order')
            ->take(3)
            ->get();
            
        return view('frontend.services.show', compact('service', 'relatedServices'));
    }
}
