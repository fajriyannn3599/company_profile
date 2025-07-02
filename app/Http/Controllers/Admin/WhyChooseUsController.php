<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $whyChooseUs = WhyChooseUs::ordered()->paginate(10);
        
        return view('admin.why-choose-us.index', compact('whyChooseUs'));
    }

    public function create()
    {
        return view('admin.why-choose-us.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'required|string|max:20',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['_token']);
        
        // Explicitly handle is_active checkbox
        $data['is_active'] = $request->has('is_active') && $request->input('is_active') == '1';
        
        if (!$data['sort_order']) {
            $data['sort_order'] = WhyChooseUs::max('sort_order') + 1;
        }

        WhyChooseUs::create($data);

        return redirect()->route('admin.why-choose-us.index')
            ->with('success', 'Item "Mengapa Memilih Kami" berhasil ditambahkan.');
    }

    public function show($id)
    {
        $whyChooseUs = WhyChooseUs::findOrFail($id);
        return view('admin.why-choose-us.show', compact('whyChooseUs'));
    }

    public function edit($id)
    {
        $whyChooseUs = WhyChooseUs::findOrFail($id);
        return view('admin.why-choose-us.edit', compact('whyChooseUs'));
    }

    public function update(Request $request, $id)
    {
        $whyChooseUs = WhyChooseUs::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'color' => 'required|string|max:20',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['_token', '_method']);
        
        // Debug: Log request data
        \Log::info('WhyChooseUs Update Request:', [
            'request_all' => $request->all(),
            'is_active_input' => $request->input('is_active'),
            'has_is_active' => $request->has('is_active')
        ]);
        
        // Explicitly handle is_active checkbox
        $data['is_active'] = $request->has('is_active') && $request->input('is_active') == '1';
        
        \Log::info('WhyChooseUs Final Data:', $data);

        $whyChooseUs->update($data);

        return redirect()->route('admin.why-choose-us.index')
            ->with('success', 'Item "Mengapa Memilih Kami" berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $whyChooseUs = WhyChooseUs::findOrFail($id);
        $whyChooseUs->delete();

        return redirect()->route('admin.why-choose-us.index')
            ->with('success', 'Item "Mengapa Memilih Kami" berhasil dihapus.');
    }
}
