<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        try {
            $articles = Article::with(['kategori', 'user'])->latest()->get();
            return view('dashboard.articles.index', compact('articles'));
        } catch (\Exception $e) {
            Log::error('Error fetching articles: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load articles.');
        }
    }

    public function create()
    {
        try {
            $kategoris = Kategori::all();
            return view('dashboard.articles.create', compact('kategoris'));
        } catch (\Exception $e) {
            Log::error('Error loading create form: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load form.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required',
                'kategori_id' => 'required|exists:kategoris,id',
                'tag' => 'nullable|string',
                'excerpt' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('articles', 'public');
            }

            // Generate unique slug
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;

            while (Article::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            Article::create([
                'title' => $request->title,
                'slug' => $slug,
                'content' => $request->content,
                'kategori_id' => $request->kategori_id,
                'tag' => $request->tag,
                'excerpt' => $request->excerpt ?? Str::limit(strip_tags($request->content), 150),
                'image' => $imagePath,
                'user_id' => auth()->id(),
            ]);

            session()->flash('success', 'Article created successfully.');
            return redirect()->route('dashboard.articles.index');
        } catch (\Exception $e) {
            Log::error('Error creating article: ' . $e->getMessage());
            session()->flash('error', 'Failed to create article. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function show(Article $article)
    {
        return view('dashboard.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        try {
            $kategoris = Kategori::all();
            return view('dashboard.articles.edit', compact('article', 'kategoris'));
        } catch (\Exception $e) {
            Log::error('Error loading edit form: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load form.');
        }
    }

    public function update(Request $request, Article $article)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required',
                'kategori_id' => 'required|exists:kategoris,id',
                'tag' => 'nullable|string',
                'excerpt' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = [
                'title' => $request->title,
                'content' => $request->content,
                'kategori_id' => $request->kategori_id,
                'tag' => $request->tag,
                'excerpt' => $request->excerpt ?? Str::limit(strip_tags($request->content), 150),
            ];

            // Only update slug if title has changed
            if ($article->title !== $request->title) {
                $slug = Str::slug($request->title);
                $originalSlug = $slug;
                $counter = 1;

                // Ensure slug is unique
                while (Article::where('slug', $slug)->where('id', '!=', $article->id)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
                $data['slug'] = $slug;
            }

            if ($request->hasFile('image')) {
                // Delete old image
                if ($article->image) {
                    Storage::disk('public')->delete($article->image);
                }
                $data['image'] = $request->file('image')->store('articles', 'public');
            }

            $article->update($data);

            session()->flash('success', 'Article updated successfully.');
            return redirect()->route('dashboard.articles.index');
        } catch (\Exception $e) {
            Log::error('Error updating article: ' . $e->getMessage());
            session()->flash('error', 'Failed to update article. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy(Article $article)
    {
        try {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $article->delete();
            session()->flash('success', 'Article deleted successfully.');
            return redirect()->route('dashboard.articles.index');
        } catch (\Exception $e) {
            Log::error('Error deleting article: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete article.');
        }
    }
}
