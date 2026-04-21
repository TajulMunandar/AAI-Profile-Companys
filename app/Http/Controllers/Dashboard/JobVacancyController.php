<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JobVacancyController extends Controller
{
    public function index()
    {
        try {
            $jobVacancies = JobVacancy::orderBy('order', 'asc')->get();

            return view('dashboard.job-vacancies.index', compact('jobVacancies'));
        } catch (\Exception $e) {
            Log::error('Error fetching job vacancies: '.$e->getMessage());

            return redirect()->back()->with('error', 'Failed to load job vacancies.');
        }
    }

    public function create()
    {
        try {
            return view('dashboard.job-vacancies.create');
        } catch (\Exception $e) {
            Log::error('Error loading create form: '.$e->getMessage());

            return redirect()->back()->with('error', 'Failed to load form.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'requirements' => 'nullable|string',
                'is_active' => 'nullable|boolean',
                'order' => 'nullable|integer',
            ]);

            JobVacancy::create([
                'title' => $request->title,
                'description' => $request->description,
                'requirements' => $request->requirements,
                'is_active' => $request->is_active ?? true,
                'order' => $request->order ?? 0,
            ]);

            session()->flash('success', 'Job vacancy created successfully.');

            return redirect()->route('dashboard.job-vacancies.index');
        } catch (\Exception $e) {
            Log::error('Error creating job vacancy: '.$e->getMessage());
            session()->flash('error', 'Failed to create job vacancy. '.$e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(JobVacancy $jobVacancy)
    {
        try {
            return view('dashboard.job-vacancies.edit', compact('jobVacancy'));
        } catch (\Exception $e) {
            Log::error('Error loading edit form: '.$e->getMessage());

            return redirect()->back()->with('error', 'Failed to load form.');
        }
    }

    public function update(Request $request, JobVacancy $jobVacancy)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'requirements' => 'nullable|string',
                'is_active' => 'nullable|boolean',
                'order' => 'nullable|integer',
            ]);

            $jobVacancy->update([
                'title' => $request->title,
                'description' => $request->description,
                'requirements' => $request->requirements,
                'is_active' => $request->is_active ?? false,
                'order' => $request->order ?? 0,
            ]);

            session()->flash('success', 'Job vacancy updated successfully.');

            return redirect()->route('dashboard.job-vacancies.index');
        } catch (\Exception $e) {
            Log::error('Error updating job vacancy: '.$e->getMessage());
            session()->flash('error', 'Failed to update job vacancy. '.$e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(JobVacancy $jobVacancy)
    {
        try {
            $jobVacancy->delete();
            session()->flash('success', 'Job vacancy deleted successfully.');

            return redirect()->route('dashboard.job-vacancies.index');
        } catch (\Exception $e) {
            Log::error('Error deleting job vacancy: '.$e->getMessage());
            session()->flash('error', 'Failed to delete job vacancy. '.$e->getMessage());

            return redirect()->back();
        }
    }
}
