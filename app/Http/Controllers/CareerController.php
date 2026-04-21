<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CareerController extends Controller
{
    public function index()
    {
        $jobVacancies = JobVacancy::where('is_active', true)->orderBy('order', 'asc')->get();

        return view('landing.career', compact('jobVacancies'));
    }

    public function apply(Request $request, JobVacancy $jobVacancy)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string',
                'email' => 'required|email',
                'cv_file' => 'required|file|mimes:pdf,doc,docx|max:2048',
            ]);

            $cvPath = $request->file('cv_file')->store('job-applications', 'public');

            JobApplication::create([
                'job_vacancy_id' => $jobVacancy->id,
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'cv_file' => $cvPath,
            ]);

            session()->flash('success', 'Your application has been submitted successfully!');

            return redirect()->route('career');
        } catch (\Exception $e) {
            Log::error('Error submitting job application: '.$e->getMessage());
            session()->flash('error', 'Failed to submit application. Please try again.');

            return redirect()->back()->withInput();
        }
    }
}
