<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Company;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Display a listing of contacts
    public function index()
    {
        $contacts = Contact::with('company')->get();
        $companies = Company::all(); // Fetch companies for the dropdown
        return view('contacts.index', compact('contacts', 'companies'));
    }

    // Show the form for creating a new contact
    public function create()
    {
        $companies = Company::all(); // Fetch companies for the dropdown
        return view('contacts.create', compact('companies'));
    }

    // Store a newly created contact
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    // Display the specified contact
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    // Show the form for editing the specified contact
    public function edit(Contact $contact)
    {
        $companies = Company::all();
        return view('contacts.edit', compact('contact', 'companies'));
    }

    // Update the specified contact
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    // Remove the specified contact
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
