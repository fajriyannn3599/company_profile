<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('category')
            ->latest()
            ->paginate(10);
        $categories = ArticleCategory::withCount('articles')->latest()->paginate(10);

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ArticleCategory::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'article_category_id' => 'required|exists:article_categories,id',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['user_id'] = Auth::id();
        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('articles', 'public');

            // Salin file ke public/storage agar bisa diakses publik
            File::copy(
                storage_path('app/public/' . $validated['featured_image']),
                public_path('storage/' . $validated['featured_image'])
            );
        }


        Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = ArticleCategory::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'article_category_id' => 'required|exists:article_categories,id',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('featured_image')) {
            // Hapus gambar lama dari storage dan public
            if ($article->featured_image) {
                Storage::disk('public')->delete($article->featured_image);

                $oldPublicPath = public_path('storage/' . $article->featured_image);
                if (file_exists($oldPublicPath)) {
                    unlink($oldPublicPath);
                }
            }

            $validated['featured_image'] = $request->file('featured_image')->store('articles', 'public');

            // Salin file baru ke public/storage
            File::copy(
                storage_path('app/public/' . $validated['featured_image']),
                public_path('storage/' . $validated['featured_image'])
            );
        }


        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Delete featured image if exists
        if ($article->featured_image) {
            Storage::disk('public')->delete($article->featured_image);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dihapus');
    }
}
