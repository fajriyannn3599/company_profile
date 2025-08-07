<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use File;
use Illuminate\Http\Request;
use Storage;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::latest()->get();
        return view('admin.awards.index', compact('awards'));
    }
    public function create()
    {
        return view('admin.awards.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:2048',
        ]);

        $path = $request->file('image')->store('awards', 'public');

        Award::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $path,
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('awards', 'public');

            // Copy ke public/storage agar dapat diakses publik
            File::copy(
                storage_path('app/public/' . $validated['image']),
                public_path('storage/' . $validated['image'])
            );
        }

        return redirect()->route('admin.awards.index')->with('success', 'Penghargaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $award = Award::findOrFail($id);
        return view('admin.awards.edit', compact('award'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $award = Award::findOrFail($id);
        $award->title = $request->title;

        // Jika file baru diupload
        if ($request->hasFile('image')) {
            // Hapus file lama
            if (Storage::disk('public')->exists($award->image)) {
                Storage::disk('public')->delete($award->image);
            }

            $award->image = $request->file('image')->store('awards', 'public');

            // Salin ke public/storage agar bisa diakses publik
            File::copy(
                storage_path('app/public/' . $award->image),
                public_path('storage/' . $award->image)
            );

        }

        $award->save();

        return redirect()->route('admin.awards.index')->with('success', 'Data penghargaan berhasil diperbarui.');
    }


    public function destroy(Award $award)
    {
        Storage::disk('public')->delete($award->image);
        $award->delete();

        return back()->with('success', 'Penghargaan berhasil dihapus.');
    }
}

