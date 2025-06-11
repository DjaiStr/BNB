<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone, // Toevoegen van telefoonnummer
            'message' => $request->message
        ];

        // Stuur e-mail naar m
        Mail::to('lacosttestmail@gmail.com')->send(new ContactMail($details));

        // Geef een succesbericht terug
        return back()->with('success', 'Uw bericht is verzonden!');
    }
}
