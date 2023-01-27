<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getAllContacts', 'contactsHome', 'newContact']]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact' => 'required|string|min:9',
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
        ]);


        return response()->json([
            'status' => 'success',
            'message' => 'Contact created successfully',
            'contact' => $contact
        ]);
    }

    public function getAllContacts()
    {
        return response()->json([
            "status" => "success",
            "data" => Contact::all()
        ]);
    }

    public function contactsHome()
    {
        $contacts = Contact::all();
        return view('contacts', compact('contacts'));
    }

    public function newContact()
    {
        return view('new_contact');
    }
}
