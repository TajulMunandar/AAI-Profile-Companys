<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function index()
    {
        try {
            $jobApplications = JobApplication::with('jobVacancy')->latest()->get();

            return view('dashboard.job-applications.index', compact('jobApplications'));
        } catch (\Exception $e) {
            Log::error('Error fetching job applications: '.$e->getMessage());

            return redirect()->back()->with('error', 'Failed to load job applications.');
        }
    }

    public function show(JobApplication $jobApplication)
    {
        return view('dashboard.job-applications.show', compact('jobApplication'));
    }

    public function destroy(JobApplication $jobApplication)
    {
        try {
            if ($jobApplication->cv_file) {
                Storage::disk('public')->delete($jobApplication->cv_file);
            }

            $jobApplication->delete();
            session()->flash('success', 'Job application deleted successfully.');

            return redirect()->route('dashboard.job-applications.index');
        } catch (\Exception $e) {
            Log::error('Error deleting job application: '.$e->getMessage());
            session()->flash('error', 'Failed to delete job application. '.$e->getMessage());

            return redirect()->back();
        }
    }
}
