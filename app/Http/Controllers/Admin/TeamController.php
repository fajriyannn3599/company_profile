<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::latest()->paginate(10);
        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('teams', 'public');

            // Copy ke public/storage agar dapat diakses publik
            File::copy(
                storage_path('app/public/' . $validated['photo']),
                public_path('storage/' . $validated['photo'])
            );
        }

        // Handle social links
        $socialLinks = [];
        if ($request->linkedin) $socialLinks['linkedin'] = $request->linkedin;
        if ($request->twitter) $socialLinks['twitter'] = $request->twitter;
        if ($request->instagram) $socialLinks['instagram'] = $request->instagram;
        if ($request->facebook) $socialLinks['facebook'] = $request->facebook;
        
        $validated['social_links'] = !empty($socialLinks) ? $socialLinks : null;
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        // Remove individual social media fields from validated data
        unset($validated['linkedin'], $validated['twitter'], $validated['instagram'], $validated['facebook']);

        Team::create($validated);

        return redirect()->route('admin.teams.index')->with('success', 'Anggota tim berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('admin.teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($team->photo) {
                Storage::disk('public')->delete($team->photo);
                $oldPublicPath = public_path('storage/' . $team->photo);
                if (file_exists($oldPublicPath)) {
                    unlink($oldPublicPath);
                }
            }
            $validated['photo'] = $request->file('photo')->store('teams', 'public');

            // Copy ke public/storage agar dapat diakses
            File::copy(
                storage_path('app/public/' . $validated['photo']),
                public_path('storage/' . $validated['photo'])
            );
        }

        // Handle social links
        $socialLinks = [];
        if ($request->linkedin) $socialLinks['linkedin'] = $request->linkedin;
        if ($request->twitter) $socialLinks['twitter'] = $request->twitter;
        if ($request->instagram) $socialLinks['instagram'] = $request->instagram;
        if ($request->facebook) $socialLinks['facebook'] = $request->facebook;
        
        $validated['social_links'] = !empty($socialLinks) ? $socialLinks : null;
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? $team->sort_order ?? 0;

        // Remove individual social media fields from validated data
        unset($validated['linkedin'], $validated['twitter'], $validated['instagram'], $validated['facebook']);

        $team->update($validated);

        return redirect()->route('admin.teams.index')->with('success', 'Anggota tim berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        if ($team->photo) {
            Storage::disk('public')->delete($team->photo);
        }

        $team->delete();

        return redirect()->route('admin.teams.index')->with('success', 'Anggota tim berhasil dihapus!');
    }
}
