<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_menu = 'contact';
        $contacts = Contact::all();
        return view('contact.contact', compact('active_menu', 'contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $active_menu = 'contact';
        $action = 'contact.store';
        return view(
            'contact.add',
            compact('active_menu', 'action')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty($request->title) && !empty($request->email) && !empty($request->phone) && !empty($request->address)) {

            $contact = new Contact();
            $contact->title = $request->title;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->address = $request->address;

            if ($contact->save()) {
                session(['alert' => 'details upload Successfully', 'class' => 'alert alert success']);
                return redirect()->route('contact');
            } else {
                session(['alert' => 'Unable to upload details please again', 'class' => 'alert alert warning']);
                return redirect()->route('contact.add');
            }
        } else {

            session(['alert' => 'All fields are required', 'class' => 'alert alert-danger']);
            return redirect()->route('contact.add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
