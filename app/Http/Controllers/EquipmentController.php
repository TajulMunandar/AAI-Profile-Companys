<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::orderBy('order')->get();
        return view('dashboard.equipment.index', compact('equipment'));
    }

    public function create()
    {
        return view('dashboard.equipment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['title', 'description', 'order']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('equipment', 'public');
        }

        Equipment::create($data);

        return redirect()->route('dashboard.equipment.index')->with('success', 'Equipment created successfully.');
    }

    public function edit(Equipment $equipment)
    {
        return view('dashboard.equipment.edit', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = $request->only(['title', 'description', 'order']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($equipment->image) {
                Storage::disk('public')->delete($equipment->image);
            }
            $data['image'] = $request->file('image')->store('equipment', 'public');
        }

        $equipment->update($data);

        return redirect()->route('dashboard.equipment.index')->with('success', 'Equipment updated successfully.');
    }

    public function destroy(Equipment $equipment)
    {
        if ($equipment->image) {
            Storage::disk('public')->delete($equipment->image);
        }
        $equipment->delete();

        return redirect()->route('dashboard.equipment.index')->with('success', 'Equipment deleted successfully.');
    }
}