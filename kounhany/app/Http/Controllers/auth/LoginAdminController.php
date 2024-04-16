<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginAdminController extends Controller
{
    public function index()
    {
        if (auth()->guard('web')->check())
            return redirect()->route('client.dashboard');
        else if (auth()->guard('admin')->check())
            return redirect()->route('admin.dashboard');
        else if (auth()->guard('expert')->check())
            return redirect()->route('expert.dashboard');
        
        return view("auth.login_admin");
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password_' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if ($admin) {
            if (!Hash::check($request->password_, $admin->password_)) {
                throw ValidationException::withMessages([
                    'password_' => 'Mot de passe incorrect',
                ]);
            }
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        }

        throw ValidationException::withMessages([
            'email' => 'Identifiants invalides',
        ]);
    }
}
