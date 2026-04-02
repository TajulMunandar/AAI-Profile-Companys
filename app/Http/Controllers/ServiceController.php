<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        try {
            $services = Service::all();
            return view('dashboard.services.index', compact('services'));
        } catch (\Exception $e) {
            Log::error('Error fetching services: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load services.');
        }
    }

    public function create()
    {
        return view('dashboard.services.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
                'icon' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('services', 'public');
            }

            // Generate unique slug
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;

            while (Service::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            Service::create([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'icon' => $request->icon,
                'image' => $imagePath,
            ]);

            session()->flash('success', 'Service created successfully.');
            return redirect()->route('dashboard.services.index');
        } catch (\Exception $e) {
            Log::error('Error creating service: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create service.')->withInput();
        }
    }

    public function show(Service $service)
    {
        return view('dashboard.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('dashboard.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
                'icon' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'icon' => $request->icon,
            ];

            // Only update slug if title has changed
            if ($service->title !== $request->title) {
                $slug = Str::slug($request->title);
                $originalSlug = $slug;
                $counter = 1;

                while (Service::where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
                $data['slug'] = $slug;
            }

            if ($request->hasFile('image')) {
                if ($service->image) {
                    Storage::disk('public')->delete($service->image);
                }
                $data['image'] = $request->file('image')->store('services', 'public');
            }

            $service->update($data);

            session()->flash('success', 'Service updated successfully.');
            return redirect()->route('dashboard.services.index');
        } catch (\Exception $e) {
            Log::error('Error updating service: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update service.')->withInput();
        }
    }

    public function destroy(Service $service)
    {
        try {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $service->delete();
            session()->flash('success', 'Service deleted successfully.');
            return redirect()->route('dashboard.services.index');
        } catch (\Exception $e) {
            Log::error('Error deleting service: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete service.');
        }
    }
}
