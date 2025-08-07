<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NisbahImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NisbahImageController extends Controller
{
    public function index()
    {
        $images = NisbahImage::all();
        return view('admin.nisbah.index', compact('images'));
    }

    public function create()
    {
        return view('admin.nisbah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $path = $request->file('image')->store('nisbah_images', 'public');

        NisbahImage::create([
            'title' => $request->title,
            'image_path' => $path,
        ]);

        return redirect()->route('admin.nisbah.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function destroy(NisbahImage $nisbah)
    {
        Storage::disk('public')->delete($nisbah->image_path);
        $nisbah->delete();
        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}

