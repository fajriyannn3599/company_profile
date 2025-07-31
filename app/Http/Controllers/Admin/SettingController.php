<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::orderBy('group')->orderBy('key')->paginate(15);
        $groups = Setting::distinct()->pluck('group');

        return view('admin.settings.index', compact('settings', 'groups'));
    }

    public function create()
    {
        abort(403, 'Menambah setting tidak diizinkan. Setting sudah dikonfigurasi secara fix.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort(403, 'Menambah setting tidak diizinkan. Setting sudah dikonfigurasi secara fix.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        return view('admin.settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        // Dynamic validation based on setting type
        $rules = [];

        if ($setting->type === 'image') {
            $rules['value'] = $request->hasFile('value')
                ? 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                : 'nullable|string';
        } elseif ($setting->type === 'file') {
            $rules['value'] = $request->hasFile('value')
                ? 'required|file|max:10240' // 10MB max
                : 'nullable|string';
        } elseif ($setting->type === 'boolean') {
            $rules['value'] = 'nullable|boolean';
        } else {
            $rules['value'] = 'required|string';
        }

        $validated = $request->validate($rules);

        if ($setting->type === 'image' && $request->hasFile('value')) {
            // Delete old image
            if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                Storage::disk('public')->delete($setting->value);

                $oldPublicPath = public_path('storage/' . $setting->value);
                if (file_exists($oldPublicPath)) {
                    unlink($oldPublicPath);
                }
            }

            $validated['value'] = $request->file('value')->store('settings', 'public');

            // Salin ke public/storage
            File::copy(
                storage_path('app/public/' . $validated['value']),
                public_path('storage/' . $validated['value'])
            );
        } elseif ($setting->type === 'file' && $request->hasFile('value')) {
            // Delete old file
            if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                Storage::disk('public')->delete($setting->value);
            }
            $validated['value'] = $request->file('value')->store('settings/files', 'public');
        } elseif ($setting->type === 'boolean') {
            $validated['value'] = $request->has('value') ? '1' : '0';
        } elseif (!$request->hasFile('value') && in_array($setting->type, ['image', 'file'])) {
            // Keep existing file if no new file uploaded
            unset($validated['value']);
        }

        // Only update if there's a value to update
        if (isset($validated['value'])) {
            $setting->update($validated);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Setting berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        abort(403, 'Menghapus setting tidak diizinkan. Setting sudah dikonfigurasi secara fix.');
    }
}
