<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Display all contacts
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    // Show create form
    public function create()
    {
        return view('contacts.create');
    }

    // Store new contact
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        Contact::create($validated);
        return redirect()->route('contacts.index')->with('success', 'Contact created.');
    }

    // Show edit form
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    // Update contact
    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $contact->update($validated);
        return redirect()->route('contacts.index')->with('success', 'Contact updated.');
    }

    // Delete contact
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted.');
    }

    // Show import form
    public function importForm()
    {
        return view('contacts.import');
    }

    // Handle XML import
    public function import(Request $request)
    {   
        //dd($request);
        $request->validate([
            'xml_file' => 'required|file|mimes:xml,txt',
        ]);

        $xml = simplexml_load_file($request->file('xml_file')->getRealPath());

        foreach ($xml->contact as $item) {
            Contact::updateOrCreate(
                [
                    'name'  => (string)$item->name,
                    'phone' => (string)$item->phone
                ]
            );
        }

        return redirect()->route('contacts.index')->with('success', 'Contacts imported successfully.');
    }
}
