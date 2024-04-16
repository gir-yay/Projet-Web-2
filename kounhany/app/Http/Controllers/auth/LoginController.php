<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        if(auth()->guard('web')->check())
            return redirect()->route('client.dashboard');
        else if(auth()->guard('admin')->check())
            return redirect()->route('admin.dashboard');
        else if(auth()->guard('expert')->check())
            return redirect()->route('expert.dashboard');

        return view("auth.login");
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password_' => 'required',
        ]);

        $client = Client::where('email', $request->email)->first();
        if ($client) {
            if (!Hash::check($request->password_, $client->password_)) {
                throw ValidationException::withMessages([
                    'password_' => 'Mot de passe incorrect',
                ]);
            }
            Auth::guard('web')->login($client);
            return redirect()->route('client.dashboard');
        }

        $expert = Expert::where('email', $request->email)->first();
        if ($expert) {
            if (!Hash::check($request->password_, $expert->password_)) {
                throw ValidationException::withMessages([
                    'password_' => 'Mot de passe incorrect',
                ]);
            }
            Auth::guard('expert')->login($expert);
            return redirect()->route('expert.dashboard');
        }

        throw ValidationException::withMessages([
            'email' => 'Identifiants invalides',
        ]);
    }
}
