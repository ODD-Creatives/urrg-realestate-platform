<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'number'  => 'nullable|string|max:20',
            'email'   => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Save to DB
        $contact = Contact::create([
            'name'    => $request->name,
            'phone'   => $request->number,
            'email'   => $request->email,
            'subject' => $request->Subject,
            'message' => $request->message,
        ]);

        // Optional: send email notification to admin
        Mail::raw("New contact message from {$request->name} \n\n{$request->message}", function ($msg) use ($request) {
            $msg->to('support@uniqueradiancerealtorsgroup.com')
                ->subject("Contact Form: {$request->Subject}");
        });

        return back()->with('success', 'Thank you for contacting us! We will get back to you shortly.');
    }
}

