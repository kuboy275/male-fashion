<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Storage;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        return view('front-end.layouts.contacts');
    }

    public function sendContact(ContactRequest $request){

        $dataInsert = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        if($request->hasFile('file_contact_path')){
            $file = $request->file_contact_path;
            $file_name = $file->getClientOriginalName();
            $file_path = $request->file('file_contact_path')->storeAs('public/contact',$file_name);
            
            $dataInsert['file_contact_path'] = Storage::url($file_path);
            $dataInsert['file_contact_name'] = $file_name;
        }

        Contact::create($dataInsert);

        return back()->with('success','Send Contact Message Successfully');

    }

}
