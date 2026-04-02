<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clients = Client::all();
            return view('dashboard.clients.index', compact('clients'));
        } catch (\Exception $e) {
            Log::error('Error fetching clients: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load clients.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'link' => 'required|url',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $photoPath = $request->file('photo')->store('clients', 'public');

            Client::create([
                'name' => $request->name,
                'link' => $request->link,
                'photo' => $photoPath,
            ]);

            session()->flash('success', 'Client created successfully.');
            return redirect()->route('dashboard.clients.index');
        } catch (\Exception $e) {
            Log::error('Error creating client: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create client.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('dashboard.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('dashboard.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'link' => 'required|url',
            ]);

            $client->update([
                'name' => $request->name,
                'link' => $request->link,
            ]);

            if ($request->file('photo')) {
                $photoPath = $request->file('photo')->store('clients', 'public');
                $client->update(['photo' => $photoPath]);
            }

            session()->flash('success', 'Client updated successfully.');
            return redirect()->route('dashboard.clients.index');
        } catch (\Exception $e) {
            Log::error('Error updating client: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update client.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        try {
            $client->delete();
            session()->flash('success', 'Client deleted successfully.');
            return redirect()->route('dashboard.clients.index');
        } catch (\Exception $e) {
            Log::error('Error deleting client: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete client.');
        }
    }
}
