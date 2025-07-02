<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageHero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageHeroController extends Controller
{
    public function index()
    {
        $pageHeroes = PageHero::orderBy('page_identifier')->get();
        return view('admin.page-hero.index', compact('pageHeroes'));
    }

    public function create()
    {
        $pages = $this->getAvailablePages();
        return view('admin.page-hero.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_identifier' => 'required|string|unique:page_heroes,page_identifier',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'background_overlay_color' => 'required|string|max:7',
            'background_overlay_opacity' => 'required|integer|min:0|max:100',
            'text_color' => 'required|in:white,dark',
            'text_alignment' => 'required|in:left,center,right',
            'cta_primary_text' => 'nullable|string|max:100',
            'cta_primary_url' => 'nullable|string|max:255',
            'cta_secondary_text' => 'nullable|string|max:100',
            'cta_secondary_url' => 'nullable|string|max:255',
            'height' => 'required|in:small,medium,large,fullscreen',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['background_image']);

        // Handle background image upload
        if ($request->hasFile('background_image')) {
            $data['background_image'] = $request->file('background_image')->store('heroes', 'public');
        }

        PageHero::create($data);

        return redirect()->route('admin.page-hero.index')
                        ->with('success', 'Page Hero berhasil ditambahkan.');
    }

    public function show(PageHero $pageHero)
    {
        return view('admin.page-hero.show', compact('pageHero'));
    }

    public function edit(PageHero $pageHero)
    {
        $pages = $this->getAvailablePages();
        return view('admin.page-hero.edit', compact('pageHero', 'pages'));
    }

    public function update(Request $request, PageHero $pageHero)
    {
        $request->validate([
            'page_identifier' => 'required|string|unique:page_heroes,page_identifier,' . $pageHero->id,
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'background_overlay_color' => 'required|string|max:7',
            'background_overlay_opacity' => 'required|integer|min:0|max:100',
            'text_color' => 'required|in:white,dark',
            'text_alignment' => 'required|in:left,center,right',
            'cta_primary_text' => 'nullable|string|max:100',
            'cta_primary_url' => 'nullable|string|max:255',
            'cta_secondary_text' => 'nullable|string|max:100',
            'cta_secondary_url' => 'nullable|string|max:255',
            'height' => 'required|in:small,medium,large,fullscreen',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['background_image']);

        // Handle background image upload
        if ($request->hasFile('background_image')) {
            // Delete old image
            if ($pageHero->background_image) {
                Storage::disk('public')->delete($pageHero->background_image);
            }
            $data['background_image'] = $request->file('background_image')->store('heroes', 'public');
        }

        $pageHero->update($data);

        return redirect()->route('admin.page-hero.index')
                        ->with('success', 'Page Hero berhasil diperbarui.');
    }

    public function destroy(PageHero $pageHero)
    {
        // Delete background image
        if ($pageHero->background_image) {
            Storage::disk('public')->delete($pageHero->background_image);
        }

        $pageHero->delete();

        return redirect()->route('admin.page-hero.index')
                        ->with('success', 'Page Hero berhasil dihapus.');
    }

    public function globalSettings()
    {
        $heroSettings = \App\Models\Setting::where('group', 'hero')->orderBy('key')->get();
        return view('admin.page-hero.global-settings', compact('heroSettings'));
    }

    public function updateGlobalSettings(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
            'settings.*.key' => 'required|string',
            'settings.*.value' => 'nullable|string',
        ]);

        foreach ($request->settings as $settingData) {
            if (isset($settingData['key']) && isset($settingData['value'])) {
                \App\Models\Setting::where('key', $settingData['key'])
                    ->update(['value' => $settingData['value']]);
            }
        }

        return redirect()->route('admin.page-hero.global-settings')
            ->with('success', 'Global hero settings updated successfully.');
    }

    private function getAvailablePages()
    {
        return [
            'home' => 'Homepage',
            'about' => 'Tentang Kami',
            'services' => 'Layanan',
            'projects' => 'Portfolio',
            'articles' => 'Artikel',
            'careers' => 'Karier',
            'contact' => 'Kontak'
        ];
    }
}
