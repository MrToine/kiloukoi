<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }

    public function submitForm(Request $request)
    {
        Mail::send(new ContactMail($request));

        return redirect()->route('contact.form')->with('success', 'Votre message a été envoyé avec succès !');
    }
}
