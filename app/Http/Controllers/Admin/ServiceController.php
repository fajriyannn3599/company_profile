<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $services = Service::with('serviceCategory')
            ->latest()
            ->paginate(10);
        $service_categories = ServiceCategory::withCount('services')->latest()->paginate(10);
        return view('admin.services.index', compact('services', 'service_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service_categories = ServiceCategory::all();
        return view('admin.services.create', compact('service_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:500',
            'requirement_description' => 'nullable|string',
            'requirement_description_2' => 'nullable|string',
            'requirement_description_3' => 'nullable|string',
            'requirement_title' => 'nullable|string|max:500',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'price_range' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
            'service_category_id' => 'required|exists:service_categories,id',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');

            // Copy ke public/storage agar dapat diakses publik
            File::copy(
                storage_path('app/public/' . $validated['image']),
                public_path('storage/' . $validated['image'])
            );
        }


        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $service_categories = ServiceCategory::all();
        return view('admin.services.edit', compact('service', 'service_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:500',
            'requirement_description' => 'nullable|string',
            'requirement_description_2' => 'nullable|string',
            'requirement_description_3' => 'nullable|string',
            'requirement_title' => 'nullable|string|max:500',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'price_range' => 'nullable|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
            'service_category_id' => 'required|exists:service_categories,id',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($request->hasFile('image')) {
            // Delete old image from both storage and public path
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
                $oldPublicPath = public_path('storage/' . $service->image);
                if (file_exists($oldPublicPath)) {
                    unlink($oldPublicPath);
                }
            }

            $validated['image'] = $request->file('image')->store('services', 'public');

            // Copy ke public/storage agar dapat diakses
            File::copy(
                storage_path('app/public/' . $validated['image']),
                public_path('storage/' . $validated['image'])
            );
        }


        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? $service->sort_order ?? 0;

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->services) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus!');
    }

}
