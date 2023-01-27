<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['getAllContacts', 'contactsHome', 'newContact', 'login']]);
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


        return redirect()->route('contactsHome');
    }

    public function getAllContacts()
    {
        return response()->json([
            "status" => "success",
            "data" => Contact::all()
        ]);
    }

    public function getContact($id)
    {
        $contact = Contact::find($id);
        return view('contact', compact('contact'));
    }

    public function contactsHome()
    {
        $contacts = Contact::all();
        return view('contacts', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);

        $contact->delete();

        return redirect()->route('contactsHome');
    }

    public function editContact($id)
    {
        $contact = Contact::find($id);
        return view('edit_contact', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact
        ]);
        if ($contact) {
            return redirect()->route('getContact', [$id]);
        }
    }
}
