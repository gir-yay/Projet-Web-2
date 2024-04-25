<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {

        $targetUrl = redirect()->back()->getTargetUrl();
        // Get the route name based on the URL
        $route = Route::getRoutes()->match(app('request')->create($targetUrl));
        $routeName = $route->getName();
        $routeParams = $route->parameters();

        // Save both route name and parameters in the session
        session()->put('previous_route', $routeName);
        session()->put('previous_route_params', $routeParams);


        if (auth()->guard('web')->check())
            return redirect()->route('client.dashboard');
        else if (auth()->guard('admin')->check())
            return redirect()->route('admin.dashboard');
        else if (auth()->guard('expert')->check())
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
            if ($client->compte_status == "non active") {
                return redirect()->back()->with('error', "Votre compte est desactivé.");
            }
            Auth::guard('web')->login($client);
            if (session()->has('previous_route') && session('previous_route') == 'expert-detail') {
                // Retrieve saved route parameters
                $routeParams = session()->get('previous_route_params');
                // Redirect to expert-detail route with parameters
                session()->forget('previous_route');
                return redirect()->route('expert-detail', $routeParams);
            }
            return redirect()->route('client.dashboard');
        }

        $expert = Expert::where('email', $request->email)->first();
        if ($expert) {
            if (!Hash::check($request->password_, $expert->password_)) {
                throw ValidationException::withMessages([
                    'password_' => 'Mot de passe incorrect',
                ]);
            }
            if ($expert->compte_status == "non active") {
                return redirect()->back()->with('error', "Votre compte est  desactivé.");
            }
            Auth::guard('expert')->login($expert);
            return redirect()->route('expert.dashboard');
        }

        throw ValidationException::withMessages([
            'email' => 'Identifiants invalides',
        ]);
    }
}
