<?php
namespace App\Http\Controllers\expert;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ExpertProfileController extends Controller
{
    public function show()
    {
        $user = auth('expert')->user();

        return view('expert.profile', compact('user'));

    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:2|max:20',
            'prenom' => 'required|min:2|max:20',
            'metier'=>'required|min:3',
            'email' => [
                'required',
                'email',
                'unique:experts,email,' . auth('expert')->id(),
            ],
            'bio' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $filePath = 'images/' . $imageName;
        }

        auth('expert')->user()->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'bio' => $request->bio,
            'metier' => $request->metier,
            'photo' => $filePath ?? auth('expert')->user()->photo,
        ]);

        return back()->with('success', 'Profil mis à jour avec succès');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:4|confirmed'
        ]);

        $currentPassword = auth('expert')->user()->password_;

        if (!Hash::check($request->current_password, $currentPassword)) {
            return back()->with('error', 'Le mot de passe actuel est incorrect');
        }

        auth('expert')->user()->update([
            'password_' => bcrypt($request->password)
        ]);

        return back()->with('success', 'Mot de passe mis à jour avec succès');
    }


}
