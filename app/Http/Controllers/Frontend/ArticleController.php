<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $categories = ArticleCategory::active()->orderBy('sort_order')->get();
        $query = Article::published()->with(['category', 'author']);

        if ($request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('excerpt', 'like', '%' . $request->search . '%')
                    ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $articles = $query->orderBy('created_at', 'desc')->paginate(9);

        // Get featured article (latest published article when no search/filter)
        $featuredArticle = null;
        if (!$request->search && !$request->category) {
            $featuredArticle = Article::published()
                ->with(['category', 'author'])
                ->orderBy('created_at', 'desc')
                ->first();

            // Remove featured article from main query if it exists
            if ($featuredArticle) {
                $articles = Article::published()
                    ->with(['category', 'author'])
                    ->where('id', '!=', $featuredArticle->id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(3);
            }
        } else {
            $featuredArticle = null;
        }

        return view('frontend.articles.index', compact('articles', 'categories', 'featuredArticle'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->where('is_published', true)->with(['category', 'author'])->firstOrFail();

        $relatedArticles = Article::published()
            ->where('article_category_id', $article->article_category_id)
            ->where('id', '!=', $article->id)
            ->with(['category', 'author'])
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('frontend.articles.show', compact('article', 'relatedArticles'));
    }
}
