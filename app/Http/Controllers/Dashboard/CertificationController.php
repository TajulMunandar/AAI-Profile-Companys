<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $certifications = Certification::orderBy('order', 'asc')->get();

            return view('dashboard.certifications.index', compact('certifications'));
        } catch (\Exception $e) {
            Log::error('Error fetching certifications: '.$e->getMessage());

            return redirect()->back()->with('error', 'Failed to load certifications.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('dashboard.certifications.create');
        } catch (\Exception $e) {
            Log::error('Error loading create form: '.$e->getMessage());

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
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'order' => 'nullable|integer',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('certifications', 'public');
            }

            Certification::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imagePath,
                'order' => $request->order ?? 0,
            ]);

            session()->flash('success', 'Certification created successfully.');

            return redirect()->route('dashboard.certifications.index');
        } catch (\Exception $e) {
            Log::error('Error creating certification: '.$e->getMessage());
            session()->flash('error', 'Failed to create certification. '.$e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Certification $certification)
    {
        return view('dashboard.certifications.show', compact('certification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certification $certification)
    {
        try {
            return view('dashboard.certifications.edit', compact('certification'));
        } catch (\Exception $e) {
            Log::error('Error loading edit form: '.$e->getMessage());

            return redirect()->back()->with('error', 'Failed to load form.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certification $certification)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'order' => 'nullable|integer',
            ]);

            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'order' => $request->order ?? 0,
            ];

            if ($request->hasFile('image')) {
                if ($certification->image) {
                    Storage::disk('public')->delete($certification->image);
                }
                $data['image'] = $request->file('image')->store('certifications', 'public');
            }

            $certification->update($data);

            session()->flash('success', 'Certification updated successfully.');

            return redirect()->route('dashboard.certifications.index');
        } catch (\Exception $e) {
            Log::error('Error updating certification: '.$e->getMessage());
            session()->flash('error', 'Failed to update certification. '.$e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certification $certification)
    {
        try {
            if ($certification->image) {
                Storage::disk('public')->delete($certification->image);
            }

            $certification->delete();

            session()->flash('success', 'Certification deleted successfully.');

            return redirect()->route('dashboard.certifications.index');
        } catch (\Exception $e) {
            Log::error('Error deleting certification: '.$e->getMessage());
            session()->flash('error', 'Failed to delete certification. '.$e->getMessage());

            return redirect()->back();
        }
    }
}
