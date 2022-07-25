<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Redirect;

class ContactController extends Controller
{
    public function index(){
    	return view("contact");
    }

    public function store(Request $request){
    	$request->validate(['name'=>'required','email'=>'required|email','message'=>'required']);
    	$contact = new Contact;
    	$contact->name = $request->name;
    	$contact->email = $request->email;
    	$contact->message = $request->message;
    	$contact->save();
    	return Redirect::back()->with('success','Thanks For contacting us. We will get back to you soon');
    }

    public function showcontacts(){
    	$contacts = Contact::paginate(15);
    	return view("admin.contacts")->with(compact('contacts'));
    }

    public function switch(Request $request){
        $contact = Contact::find($request->id);
        if ($contact->status==0) {
            $contact->status = 1;
        }else{
            $contact->status = 0;
        }
        $contact->save();
        return response()->json(['Status Switched Successfully']);
    }

    public function delete(Request $request){
    	$contact = Contact::find($request->id);
    	$contact->delete();
    	return response()->json(['Deleted Successfully']);
    }
}
