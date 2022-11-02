<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //create contactData
    public function contactData(Request $request){


       Contact::create([
        'message' =>$request-> message,
        'name' =>$request-> name,
        'email' => $request->email,
        'subject' => $request->subject,
       ]);
       return response()->json([
        'status'=>true
       ]);

    }
    //get contactPage
    public function contactPage(){
        $contacts=Contact::orderBy('created_at','desc')->get();
        return view('admin.contact.index',compact('contacts'));
    }
}
