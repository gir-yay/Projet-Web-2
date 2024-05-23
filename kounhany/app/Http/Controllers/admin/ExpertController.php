<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\CommentairesSurClient;


use Illuminate\Http\Request;
class ExpertController extends Controller
{
    public function toggleStatus($id)
    {
        $expert = Expert::findOrFail($id);
    
        if ($expert->compte_status === 'active') {
            $expert->compte_status = 'non active';
        } else {
            $expert->compte_status = 'active';
        }
    
        $expert->save();
    
        return redirect()->back()->with('success', 'Statut de l\'expert mis à jour avec succès.');
    }

    //afficher les commentaires de l'expert sélectionné + les infos de l'expert
    public function sdk_show($id){
        //infos exp
        $expert = Expert::find($id);
        //charger la relation demande et client a la fois
        $commentaires = CommentairesSurClient::with('demande.client')->where('expert_id', $id)->get();
        return view("sdk_show",compact('expert','commentaires'));
    }
    
    //supprimer le commentairec
    public function sdk_delete($id)
    {
        $comment = CommentairesSurClient::find($id);
        if (!$comment) {
            return redirect()->back()->with('error', 'erreur lors de la suppression !');
        }
        $comment->delete();
        return redirect()->back()->with('success', 'Commentaire supprimé !');
    }
}