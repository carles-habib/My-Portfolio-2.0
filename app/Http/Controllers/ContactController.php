<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\Inbox;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submitmessage(Request $request)
    {
        $message = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required| max:255| email',
            'phone' => 'required',
            'service' => 'required',
            'message' => 'required | max:255'
        ]);

        $inboxes = inbox::create($message);

        return redirect('/')->with('success', 'Message sent!');
    }

    public function contacts(){
        return  redirect()->route('/');
    }


}
