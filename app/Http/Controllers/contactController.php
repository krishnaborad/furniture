<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact;

class contactController extends Controller
{
    public function index()
    {
        $heading="";
        $contacts = contact::all();
        return view('admin/contact', ['heading'=> $heading ,'contacts'=> $contacts]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'query'=>'required'
        ]);

        $contact = new contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->query = $request->input('query');

        $contact->save();
        \Session::flash('flash_message','successfully saved.');
        return redirect('admin/contact');
    }
    public function delete($id)
    {
        $contact = contact::find($id);
        $contact->delete();
        return redirect('admin/contact');
    }

}
