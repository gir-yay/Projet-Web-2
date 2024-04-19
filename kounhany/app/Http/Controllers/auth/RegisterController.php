<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;
use App\Models\Expert;




class RegisterController extends Controller
{

    public function index()
    {
        return view("auth.register");
    }


    public function sdk_expert()
    {
        return view('auth.sdk_expert');
    }
    public function sdk_signup()
    {
        return view('auth.sdk_signup');
    }

    public function sdk_client()
    {
        return view('auth.sdk_client');
    }

    public function sdk_stock_client(Request $r)
    {
        $r->validate(['nom'=>'required|min:2|max:20','prenom'=>'required|min:2|max:20','email'=>'required|email|unique:clients','tel'=>'required|numeric|digits:10|regex:/^0\d{9}$/','adresse'=>'required','password'=>'required|min:4']);
        $nom=$r->nom;
        $prenom=$r->prenom;
        $email=$r->email;
        $tel=$r->tel;
        $adresse=$r->adresse;
        $mdp=Hash::make($r->password);
        $statut="active";
        Client::create(['nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'password_'=>$mdp,'adresse'=>$adresse,'phone'=>$tel,'compte_status'=>$statut]);
        return redirect()->route('login')->with('success', 'You have successfully signed in !');
    }

    public function sdk_stock_expert(Request $r)
    {
        $r->validate(['nom'=>'required|min:2|max:20','prenom'=>'required|min:2|max:20','email'=>'required|email|unique:experts','metier'=>'required|min:3','password'=>'required|min:4','bio'=>'required']);
        $r->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' ]);
        if ($r->hasFile('image')) {
            $image = $r->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $filePath = 'images/' . $imageName;
        }
        $nom=$r->nom;
        $prenom=$r->prenom;
        $email=$r->email;
        $metier=$r->metier;
        $bio=$r->bio;
        $mdp=Hash::make($r->password);
        $statut="active";
        Expert::create(['nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'password_'=>$mdp,'metier'=>$metier,'bio'=>$bio,'photo'=>$filePath,'compte_status'=>$statut]);
        return redirect()->route('login')->with('success', 'You have successfully signed in !');
    }



    
}
