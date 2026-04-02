<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $comments = Comment::with('article')->get();
            return view('dashboard.comments.index', compact('comments'));
        } catch (\Exception $e) {
            Log::error('Error fetching comments: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load comments.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $articles = Article::all();
            return view('dashboard.comments.create', compact('articles'));
        } catch (\Exception $e) {
            Log::error('Error loading create form: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load form.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'article_id' => 'required|exists:articles,id',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'comment' => 'required|string',
            ]);

            Comment::create([
                'article_id' => $request->article_id,
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,
            ]);

            // Check if this is a public comment submission (from blog detail page)
            if ($request->has('is_public') && $request->is_public) {
                session()->flash('success', 'Comment submitted successfully!');
                return redirect()->back();
            }

            session()->flash('success', 'Comment created successfully.');
            return redirect()->route('dashboard.comments.index');
        } catch (\Exception $e) {
            Log::error('Error creating comment: ' . $e->getMessage());
            session()->flash('error', 'Failed to create comment. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('dashboard.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        try {
            $articles = Article::all();
            return view('dashboard.comments.edit', compact('comment', 'articles'));
        } catch (\Exception $e) {
            Log::error('Error loading edit form: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load form.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        try {
            $request->validate([
                'article_id' => 'required|exists:articles,id',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'comment' => 'required|string',
            ]);

            $comment->update([
                'article_id' => $request->article_id,
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,
            ]);

            session()->flash('success', 'Comment updated successfully.');
            return redirect()->route('dashboard.comments.index');
        } catch (\Exception $e) {
            Log::error('Error updating comment: ' . $e->getMessage());
            session()->flash('error', 'Failed to update comment. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
            session()->flash('success', 'Comment deleted successfully.');
            return redirect()->route('dashboard.comments.index');
        } catch (\Exception $e) {
            Log::error('Error deleting comment: ' . $e->getMessage());
            session()->flash('error', 'Failed to delete comment.');
            return redirect()->back();
        }
    }
}
