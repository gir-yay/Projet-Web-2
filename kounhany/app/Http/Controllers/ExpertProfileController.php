<?php
namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ExpertProfileController extends Controller
{
    public function show()
    {   
        $user = auth('expert')->user();
       // return view('expert.profile');
        
        //$user = Auth::user();
        return view('expert.profile', compact('user'));
    
    }
    public function sdk_edit_expert(Expert $expert){

        return view('sdk_edit_expert',compact('expert'));
    }
    public function sdk_update_expert(Request $r , Expert $expert){
        $r->validate(['nom'=>'required|min:2|max:20','prenom'=>'required|min:2|max:20','email' => 'required|email|unique:experts,email,'.$expert->id,'metier'=>'required|min:3','password'=>'required|min:4','bio'=>'required']);
        $r->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' ]);
        if ($r->hasFile('image')) {
            $image = $r->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $filePath = 'images/' . $imageName;
            $expert->photo = $filePath; 
        }

        $statut="active";

        $expert->nom = $r->nom;
        $expert->prenom = $r->prenom;
        $expert->email = $r->email;
        $expert->metier = $r->metier;
        $expert->bio = $r->bio;
        $expert->password_ = Hash::make($r->password);
        $expert->compte_status = $statut;
        $expert->save();

        return redirect()->route('expert.profile')->with('success', 'Votre profil a été mis à jour avec succès !');
    }
    

}