<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\EmailSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('auth.home');
    }

    public function contact(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);
        $email_settings = EmailSettings::first();
        if(!$email_settings){
            return back()->with('error', 'Email settings not found');
        }
        config()->set('mail.mailers.smtp', [
            'transport' => 'smtp',
            'host' => $email_settings->host,
            'port' => $email_settings->port,
            'encryption' => $email_settings->encryption,
            'username' => $email_settings->username,
            'password' => $email_settings->password,

        ]);
        config()->set('mail.from', [
            'address' => $email_settings->username,
            'name' => "KounHany",
        ]);

        Mail::to("salmanbenomar988@gmail.com")->send(new ContactMail($request->email, $request->message));
        return back()->with('success', 'Message envoyé avec succès');

    }

}
