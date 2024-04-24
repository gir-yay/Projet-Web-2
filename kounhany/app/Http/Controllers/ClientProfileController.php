<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function sdk_edit_client(Client $client){
        return view("sdk_editclient",compact('client'));
    }
    public function sdk_update_client(Request $r,Client $client){
        $r->validate(['nom'=>'required|min:2|max:20','prenom'=>'required|min:2|max:20','email' => 'required|email|unique:clients,email,'.$client->id,'tel'=>'required|numeric|digits:10|regex:/^0\d{9}$/','adresse'=>'required','password'=>'required|min:4']);
        $nom=$r->nom;
        $prenom=$r->prenom;
        $email=$r->email;
        $tel=$r->tel;
        $adresse=$r->adresse;
        $mdp=Hash::make($r->password);
        $statut="active";
        // Récupérer les données du formulaire
        $data = $r->only(['nom', 'prenom', 'email', 'adresse']);
        $data['password'] = Hash::make($r->password);
        $data['compte_status'] = "active";
        $data['phone'] = $r->tel;

        // Mettre à jour les attributs du client
        $client->fill($data);
        // Enregistrer les modifications dans la base de données
        $client->save();
        return redirect()->route('client.profile')->with('success', 'Votre profil a été mis à jour avec succès !');

    }

}