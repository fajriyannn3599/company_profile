<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index(Request $request)
    {
        $service_categories = ServiceCategory::active()->orderBy('sort_order')->get();
        $query = Service::active()->orderBy('sort_order')
            ->with(['serviceCategory']);

        if ($request->service_category) {
            $query->whereHas('serviceCategory', function($q) use ($request) {
                $q->where('slug', $request->service_category);
            });
        }

        // Filter pencarian berdasarkan judul layanan
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori layanan
        if ($request->filled('service_category_id')) {
            $query->where('service_category_id', $request->service_category_id);
        }

        if ($request->filled('servicecategory')) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('slug', $request->servicecategory);
        });
    }
        // Ambil data layanan
        $services = $query->paginate(12)->withQueryString();
        // Ambil data kenapa memilih kami
        $whyChooseUs = WhyChooseUs::active()->ordered()->get();

        // Ambil semua kategori layanan untuk keperluan filter di view

        $featuredService = Service::active()->orderBy('created_at', 'desc')->first(); // Atau logika lain untuk featured

        return view('frontend.services.index', compact('services', 'whyChooseUs', 'featuredService', 'service_categories'));
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
