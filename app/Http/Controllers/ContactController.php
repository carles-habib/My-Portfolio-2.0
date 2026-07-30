<?php

namespace App\Http\Controllers;

use App\Mail\NewContactMessage;
use App\Models\ContactInfo;
use App\Models\Inbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submitmessage(Request $request)
    {
        $message = $request->validate([
            // Honeypot — a real browser leaves this empty.
            'website' => 'prohibited',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required| max:255| email',
            'phone' => 'required',
            'service' => 'required|string|max:255|exists:services,name',
            'message' => 'required | max:255'
        ]);

        unset($message['website']);

        $inbox = Inbox::create($message);

        $notifyEmail = ContactInfo::value('email') ?? config('mail.from.address');

        if ($notifyEmail) {
            Mail::to($notifyEmail)->send(new NewContactMessage($inbox));
        }

        return redirect()->route('home')->withFragment('contact-section')->with('success', 'Your message has been sent. Thanks for reaching out!');
    }

    public function contacts()
    {
        return redirect()->route('home');
    }

    public function ShowContact()
    {
        $contactInfo = ContactInfo::first();

        return view('settings.contact-info', compact('contactInfo'));
    }
}
