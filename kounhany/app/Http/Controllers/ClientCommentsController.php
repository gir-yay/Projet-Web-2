<?php

namespace App\Http\Controllers;

use App\Models\CommentairesSurClient;
use Illuminate\Http\Request;
use App\Models\CommentairesSurExpert;


class ClientCommentsController extends Controller
{

    public function store(Request $request)
    {
        $client = auth()->user(); // Assuming the authenticated user is a client
         $validatedData = $request->validate([
        'note' => 'required|integer',
        'demande_id' => 'required|exists:demandes_clients,id',
        'client_id' => 'required|exists:clients,id',
        'expert_id' => 'required|exists:experts,id',
        'commentaire' => 'required|string|max:255',
    ]);

    // Create and store the comment
        $comment = new CommentairesSurExpert();
        $comment->demande_id = $validatedData['demande_id'];
        $comment->expert_id = $validatedData['expert_id'];
        $comment->client_id = $validatedData['client_id'];
        $comment->note = $validatedData['note'];
        $comment->commentaire = $validatedData['commentaire'];
        $commentaireSurClient = CommentairesSurClient::where('demande_id', $validatedData['demande_id'])->first();
        if($commentaireSurClient){
            $commentaireSurClient->afficher = 1;
            $commentaireSurClient->save();
            $comment->afficher = 1;
        }
        $comment->save();

        toastr()->success('Commentaire ajouté avec succès');
        //go back to client.demandes
        return redirect()->route('client.demande_client');
    }
}

?>
