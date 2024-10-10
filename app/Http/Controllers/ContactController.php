<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $contacts = Contact::all();
    
        return view('Dashboard.contact.index', compact('contacts'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);


         
        // return redirect()->back();
    return redirect()->route('contactUS')->with('success', 'Blog updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
     $contact = Contact::find($id);
    return view('Dashboard.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
{
    $contact = Contact::find($id);
    $contact->delete();

    return redirect()->route('contact.index')->with('success', 'Category deleted successfully.');
}

}
