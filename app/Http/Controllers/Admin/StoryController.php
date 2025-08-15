<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use File;
use Illuminate\Http\Request;
use Storage;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::latest()->get();
        return view('admin.stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.stories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'year' => 'required|string|max:4',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Upload gambar
        $data['image'] = $request->file('image')->store('stories', 'public');

        // Salin ke public/storage agar dapat diakses publik
        File::copy(
            storage_path('app/public/' . $data['image']),
            public_path('storage/' . $data['image'])
        );

        // Simpan data
        Story::create([
            'year' => $data['year'],
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
            'sort_order' => $data['sort_order'] ?? 0,
            'is_active' => $data['is_active'] ?? false,
        ]);

        return redirect()->route('admin.stories.index')->with('success', 'Sejarah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $story = Story::findOrFail($id);
        return view('admin.stories.edit', compact('story'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'year' => 'required|string|max:4',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $story = Story::findOrFail($id);

        // Jika ada upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus file lama
            if (Storage::disk('public')->exists($story->image)) {
                Storage::disk('public')->delete($story->image);
            }

            // Upload gambar baru
            $data['image'] = $request->file('image')->store('stories', 'public');

            // Salin ke public/storage
            File::copy(
                storage_path('app/public/' . $data['image']),
                public_path('storage/' . $data['image'])
            );
        } else {
            // Pertahankan gambar lama jika tidak ada upload baru
            $data['image'] = $story->image;
        }

        // Update data
        $story->update([
            'year' => $data['year'],
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
            'sort_order' => $data['sort_order'] ?? 0,
            'is_active' => $data['is_active'] ?? false,
        ]);

        return redirect()->route('admin.stories.index')->with('success', 'Data sejarah berhasil diperbarui.');
    }

    public function destroy(Story $story)
    {
        // Hapus file gambar
        if (Storage::disk('public')->exists($story->image)) {
            Storage::disk('public')->delete($story->image);
        }

        $story->delete();

        return back()->with('success', 'Sejarah berhasil dihapus.');
    }
}
