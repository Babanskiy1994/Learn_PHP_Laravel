<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function showContactForm()
    {
        return view("contact_form");
    }

    public function contactForm(ContactFormRequest $request)
    {
        $email = $request->input("email");
        Mail::to($email)->send(new ContactForm($request->validated()));

        return redirect(route("home"));
    }
}
