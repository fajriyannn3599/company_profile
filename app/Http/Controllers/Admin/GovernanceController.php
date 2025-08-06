<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Governance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class GovernanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $governances = Governance::latest()->paginate(10); // atau ->get();
        return view('admin.governances.index', compact('governances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.governances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|mimes:pdf|max:2048',
        ]);



        $originalName = $request->file('file')->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('governances', $originalName, 'public');

        // Salin ke public/storage agar bisa diakses publik
        File::copy(
            storage_path('app/public/' . $filePath),
            public_path('storage/' . $filePath)
        );





        Governance::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.governances.index')->with('success', 'Piagam berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.governances.show', compact('governance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.governances.edit', compact('governance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Governance $governance)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        // Jika file baru diupload
        if ($request->hasFile('file')) {
            // Hapus file lama
            if (Storage::disk('public')->exists($governance->file_path)) {
                Storage::disk('public')->delete($governance->file_path);
            }

            $data['file_path'] = $request->file('file')->store('governances', 'public');

            // Salin ke public/storage agar bisa diakses publik
            File::copy(
                storage_path('app/public/' . $data['file_path']),
                public_path('storage/' . $data['file_path'])
            );

        }

        $governance->update($data);

        return redirect()->route('admin.governances.index')->with('success', 'Piagam berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $governance = Governance::findOrFail($id);

        if (Storage::disk('public')->exists($governance->file_path)) {
            Storage::disk('public')->delete($governance->file_path);
        }

        $governance->delete();

        return redirect()->route('admin.governances.index')->with('success', 'Piagam berhasil dihapus.');
    }
}
