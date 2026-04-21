<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::query();

        // Search
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->where('kategori_id', $request->category);
        }

        $articles = $query->latest('published_at')->paginate(6);
        $recentArticles = Article::latest('published_at')->take(3)->get();
        $categories = Kategori::all();

        return view('landing.blog', compact('articles', 'recentArticles', 'categories'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        // Get previous and next articles
        $prevArticle = Article::where('published_at', '<', $article->published_at)
            ->orderBy('published_at', 'desc')
            ->first();

        $nextArticle = Article::where('published_at', '>', $article->published_at)
            ->orderBy('published_at', 'asc')
            ->first();

        $recentArticles = Article::latest('published_at')->take(3)->get();
        $categories = Kategori::all();

        return view('landing.blog-detail', compact(
            'article',
            'prevArticle',
            'nextArticle',
            'recentArticles',
            'categories'
        ));
    }
}
