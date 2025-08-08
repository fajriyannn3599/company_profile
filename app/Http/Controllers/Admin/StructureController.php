<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Structure;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Structure::all();
        return view('admin.structures.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.structures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $path = $request->file('image')->store('structures', 'public');

        Structure::create([
            'title' => $request->title,
            'image_path' => $path,
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('structures', 'public');

            // Copy ke public/storage agar dapat diakses publik
            File::copy(
                storage_path('app/public/' . $validated['image']),
                public_path('storage/' . $validated['image'])
            );
        }

        return redirect()->route('admin.structures.index')->with('success', 'Gambar berhasil ditambahkan.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Structure $structure)
    {
        Storage::disk('public')->delete($structure->image_path);
        $structure->delete();
        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
