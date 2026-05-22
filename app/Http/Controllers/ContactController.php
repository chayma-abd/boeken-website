<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('contact.form')->with('success', 'Je bericht is verzonden! We nemen zo snel mogelijk contact op.');
    }

    public function adminIndex()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('contact.admin', compact('contacts'));
    }

    public function markAsRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);
        return redirect()->route('contact.admin')->with('success', 'Bericht gemarkeerd als gelezen!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact.admin')->with('success', 'Bericht verwijderd!');
    }
}