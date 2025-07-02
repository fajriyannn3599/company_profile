<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageSeoController extends Controller
{
    public function index()
    {
        $pageSeos = PageSeo::orderBy('page_identifier')->get();
        return view('admin.page-seo.index', compact('pageSeos'));
    }

    public function create()
    {
        $pages = $this->getAvailablePages();
        return view('admin.page-seo.create', compact('pages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_identifier' => 'required|string|unique:page_seos,page_identifier',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'keywords' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:500',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'twitter_title' => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string|max:500',
            'twitter_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'schema_markup' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['og_image', 'twitter_image']);

        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            $data['og_image'] = $request->file('og_image')->store('seo/og-images', 'public');
        }

        // Handle Twitter image upload
        if ($request->hasFile('twitter_image')) {
            $data['twitter_image'] = $request->file('twitter_image')->store('seo/twitter-images', 'public');
        }

        PageSeo::create($data);

        return redirect()->route('admin.page-seo.index')
                        ->with('success', 'Page SEO berhasil ditambahkan.');
    }

    public function show(PageSeo $pageSeo)
    {
        return view('admin.page-seo.show', compact('pageSeo'));
    }

    public function edit(PageSeo $pageSeo)
    {
        $pages = $this->getAvailablePages();
        return view('admin.page-seo.edit', compact('pageSeo', 'pages'));
    }

    public function update(Request $request, PageSeo $pageSeo)
    {
        $request->validate([
            'page_identifier' => 'required|string|unique:page_seos,page_identifier,' . $pageSeo->id,
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'keywords' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:500',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'twitter_title' => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string|max:500',
            'twitter_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'schema_markup' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $data = $request->except(['og_image', 'twitter_image']);        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            // Delete old image
            if ($pageSeo->og_image) {
                Storage::disk('public')->delete($pageSeo->og_image);
            }
            $data['og_image'] = $request->file('og_image')->store('seo/og-images', 'public');
        }

        // Handle Twitter image upload
        if ($request->hasFile('twitter_image')) {
            // Delete old image
            if ($pageSeo->twitter_image) {
                Storage::disk('public')->delete($pageSeo->twitter_image);
            }
            $data['twitter_image'] = $request->file('twitter_image')->store('seo/twitter-images', 'public');
        }

        $pageSeo->update($data);

        return redirect()->route('admin.page-seo.index')
                        ->with('success', 'Page SEO berhasil diperbarui.');
    }    public function destroy(PageSeo $pageSeo)
    {
        // Delete images
        if ($pageSeo->og_image) {
            Storage::disk('public')->delete($pageSeo->og_image);
        }
        if ($pageSeo->twitter_image) {
            Storage::disk('public')->delete($pageSeo->twitter_image);
        }

        $pageSeo->delete();

        return redirect()->route('admin.page-seo.index')
                        ->with('success', 'Page SEO berhasil dihapus.');
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
