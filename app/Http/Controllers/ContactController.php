<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        
        $pageTitle = 'Contact';
    return view('contact', compact('pageTitle'));
        // return view('contact');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];
        
        $recipients = ['contact@buyaccsmarket.com', 'choyonbarman2020@gmail.com'];

        Mail::to($recipients)->send(new ContactMail($data));

        Session::flash('success', 'Your message has been sent successfully!');

        return redirect()->back();
    }
    
}
