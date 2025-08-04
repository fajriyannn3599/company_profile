<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use File;
use Illuminate\Http\Request;
use Storage;
use Str;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service_categories = ServiceCategory::withCount('services')->latest()->paginate(10);
        return view('admin.service-categories.index', compact('service_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => 'nullable|string|max:255|unique:service_categories',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('service_categories', 'public');

            // Copy ke public/storage agar dapat diakses publik
            File::copy(
                storage_path('app/public/' . $validated['image']),
                public_path('storage/' . $validated['image'])
            );
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');

        ServiceCategory::create($validated);

        return redirect()->route('admin.service-categories.index')->with('success', 'Service category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCategory $serviceCategory)
    {
        $serviceCategory = ServiceCategory::findOrFail($serviceCategory->id);
        return view('admin.service-categories.edit', compact('serviceCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slug' => 'nullable|string|max:255|unique:service_categories,slug,' . $serviceCategory->id,
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        if ($request->hasFile('image')) {
            // Delete old image
            if ($serviceCategory->image) {
                Storage::disk('public')->delete($serviceCategory->image);
                $oldPublicPath = public_path('storage/' . $serviceCategory->image);
                if (file_exists($oldPublicPath)) {
                    unlink($oldPublicPath);
                }
            }
            $validated['image'] = $request->file('image')->store('service_categories', 'public');

            // Copy ke public/storage agar dapat diakses
            File::copy(
                storage_path('app/public/' . $validated['image']),
                public_path('storage/' . $validated['image'])
            );
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');

        $serviceCategory->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCategory $serviceCategory)
    {
        if ($serviceCategory->services()->count() > 0) {
            return redirect()->route('admin.service-categories.index')
                ->with('error', 'Service category cannot be deleted because it has associated services.');
        }

        $serviceCategory->delete();

        return redirect()->route('admin.service-categories.index')->with('success', 'Service category deleted successfully.');
    }
}
