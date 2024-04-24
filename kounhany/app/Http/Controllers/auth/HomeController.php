<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Mail\CommentMail;
use App\Mail\ContactMail;
use App\Models\DemandesClient;
use Carbon\Carbon;
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

        Mail::to("salmanbenomar988@gmail.com")->send(new ContactMail($request->email, $request->message));
        return back()->with('success', 'Message envoyé avec succès');
    }
}
