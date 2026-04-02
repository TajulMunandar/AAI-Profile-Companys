<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    public function index()
    {
        try {
            $sliders = Slider::orderBy('order')->get();
            return view('dashboard.sliders.index', compact('sliders'));
        } catch (\Exception $e) {
            Log::error('Error fetching sliders: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load sliders.');
        }
    }

    public function create()
    {
        return view('dashboard.sliders.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'medium_caption' => 'nullable|string|max:255',
                'big_caption' => 'nullable|string|max:255',
                'small_caption' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'order' => 'nullable|integer|min:0',
                'is_active' => 'nullable|boolean',
            ]);

            $sliderData = [
                'medium_caption' => $request->medium_caption,
                'big_caption' => $request->big_caption,
                'small_caption' => $request->small_caption,
                'order' => $request->order ?? 0,
                'is_active' => $request->is_active ?? true,
            ];

            if ($request->file('image')) {
                $sliderData['image'] = $request->file('image')->store('sliders', 'public');
            }

            Slider::create($sliderData);

            session()->flash('success', 'Slider created successfully.');
            return redirect()->route('dashboard.sliders.index');
        } catch (\Exception $e) {
            Log::error('Error creating slider: ' . $e->getMessage());
            session()->flash('error', 'Failed to create slider. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        try {
            $request->validate([
                'medium_caption' => 'nullable|string|max:255',
                'big_caption' => 'nullable|string|max:255',
                'small_caption' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'order' => 'nullable|integer|min:0',
                'is_active' => 'nullable|boolean',
            ]);

            $sliderData = [
                'medium_caption' => $request->medium_caption,
                'big_caption' => $request->big_caption,
                'small_caption' => $request->small_caption,
                'order' => $request->order ?? 0,
                'is_active' => $request->is_active ?? true,
            ];

            if ($request->file('image')) {
                $sliderData['image'] = $request->file('image')->store('sliders', 'public');
            }

            $slider->update($sliderData);

            session()->flash('success', 'Slider updated successfully.');
            return redirect()->route('dashboard.sliders.index');
        } catch (\Exception $e) {
            Log::error('Error updating slider: ' . $e->getMessage());
            session()->flash('error', 'Failed to update slider. ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy(Slider $slider)
    {
        try {
            $slider->delete();
            session()->flash('success', 'Slider deleted successfully.');
            return redirect()->route('dashboard.sliders.index');
        } catch (\Exception $e) {
            Log::error('Error deleting slider: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete slider.');
        }
    }
}
