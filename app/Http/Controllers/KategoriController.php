<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $kategoris = Kategori::all();
            return view('dashboard.kategoris.index', compact('kategoris'));
        } catch (\Exception $e) {
            Log::error('Error fetching kategoris: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load categories.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategoris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
            ]);

            Kategori::create([
                'nama' => $request->nama,
            ]);

            session()->flash('success', 'Category created successfully.');
            return redirect()->route('dashboard.kategoris.index');
        } catch (\Exception $e) {
            Log::error('Error creating kategori: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create category.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        return view('dashboard.kategoris.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategoris.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
            ]);

            $kategori->update([
                'nama' => $request->nama,
            ]);

            session()->flash('success', 'Category updated successfully.');
            return redirect()->route('dashboard.kategoris.index');
        } catch (\Exception $e) {
            Log::error('Error updating kategori: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update category.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        try {
            $kategori->delete();
            session()->flash('success', 'Category deleted successfully.');
            return redirect()->route('dashboard.kategoris.index');
        } catch (\Exception $e) {
            Log::error('Error deleting kategori: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete category.');
        }
    }
}
