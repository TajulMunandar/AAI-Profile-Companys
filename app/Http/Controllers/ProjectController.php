<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $projects = Project::all();
            return view('dashboard.projects.index', compact('projects'));
        } catch (\Exception $e) {
            Log::error('Error fetching projects: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load projects.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Use validate() with fails() check for proper error handling
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
                'client_name' => 'required|string|max:255',
                'project_type' => 'required|string|max:255',
                'location' => 'nullable|string|max:255',
                'project_director' => 'nullable|string|max:255',
                'date' => 'required|date',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('image')->store('projects', 'public');

            Project::create([
                'title' => $request->title,
                'description' => $request->description,
                'client_name' => $request->client_name,
                'project_type' => $request->project_type,
                'location' => $request->location,
                'project_director' => $request->project_director,
                'date' => $request->date,
                'image' => $imagePath,
            ]);

            session()->flash('success', 'Project created successfully.');
            return redirect()->route('dashboard.projects.index');
        } catch (\Exception $e) {
            Log::error('Error creating project: ' . $e->getMessage());
            session()->flash('error', 'Failed to create project. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('dashboard.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
                'client_name' => 'required|string|max:255',
                'project_type' => 'required|string|max:255',
                'location' => 'nullable|string|max:255',
                'project_director' => 'nullable|string|max:255',
                'date' => 'required|date',
            ]);

            $project->update([
                'title' => $request->title,
                'description' => $request->description,
                'client_name' => $request->client_name,
                'project_type' => $request->project_type,
                'location' => $request->location,
                'project_director' => $request->project_director,
                'date' => $request->date,
            ]);

            if ($request->file('image')) {
                $imagePath = $request->file('image')->store('projects', 'public');
                $project->update(['image' => $imagePath]);
            }

            session()->flash('success', 'Project updated successfully.');
            return redirect()->route('dashboard.projects.index');
        } catch (\Exception $e) {
            Log::error('Error updating project: ' . $e->getMessage());
            session()->flash('error', 'Failed to update project. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            $project->delete();
            session()->flash('success', 'Project deleted successfully.');
            return redirect()->route('dashboard.projects.index');
        } catch (\Exception $e) {
            Log::error('Error deleting project: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete project.');
        }
    }
}
