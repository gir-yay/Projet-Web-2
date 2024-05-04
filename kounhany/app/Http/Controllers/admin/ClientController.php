<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\CommentairesSurExpert;

use Illuminate\Http\Request;
class ClientController extends Controller
{
    public function toggleStatus($id)
{
    $client = Client::findOrFail($id);

    // Inversion du statut
    if ($client->compte_status === 'active') {
        $client->compte_status = 'non active';
    } else {
        $client->compte_status = 'active';
    }

    $client->save();

    return redirect()->back()->with('success', 'Statut du client mis à jour avec succès.');
}
//afficher les commentaires de l'expert sélectionné + les infos de l'expert
public function show_comment($id){
    //infos exp
    $client = Client::find($id);
    //charger la relation demande et client a la fois
    $commentaires = CommentairesSurExpert::with('demande.client')->where('client_id', $id)->get();
    return view("showCommentaires",compact('client','commentaires'));
}

//supprimer le commentaire
public function delete_comment($id)
{
    $comment = CommentairesSurExpert::find($id);
    if (!$comment) {
        return redirect()->back()->with('error', 'erreur lors de la suppression !');
    }
    $comment->delete();
    return redirect()->back()->with('success', 'Commentaire supprimé !');
}
}