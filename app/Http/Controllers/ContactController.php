<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $contacts = Contact::all();
            return view('dashboard.contacts.index', compact('contacts'));
        } catch (\Exception $e) {
            Log::error('Error fetching contacts: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to load contacts.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone_number' => 'required|string|max:20',
                'message' => 'required',
            ]);

            Contact::create($request->all());

            return redirect()->route('dashboard.contacts.index')->with('success', 'Contact created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating contact: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create contact.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('dashboard.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('dashboard.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        try {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone_number' => 'required|string|max:20',
                'message' => 'required',
            ]);

            $contact->update($request->all());

            return redirect()->route('dashboard.contacts.index')->with('success', 'Contact updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating contact: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update contact.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            return redirect()->route('dashboard.contacts.index')->with('success', 'Contact deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting contact: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete contact.');
        }
    }

    /**
     * Handle public contact form submission
     */
    public function submit(Request $request)
    {
        try {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone_number' => 'required|string|max:20',
                'message' => 'required|string',
            ]);

            Contact::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'message' => $request->message,
            ]);

            session()->flash('success', 'Thank you for contacting us! We will get back to you soon.');
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error submitting contact form: ' . $e->getMessage());
            session()->flash('error', 'Failed to send message. Please try again.');
            return redirect()->back()->withInput();
        }
    }
}
