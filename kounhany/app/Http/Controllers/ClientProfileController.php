<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientProfileController extends Controller
{
    public function show()
    {   
        //get the current authenticated client's data
        $user = auth()->user();
       // return view('expert.profile');
        
        //$user = Auth::user();
        return view('user.client.profile', compact('user'));
    
    }

}