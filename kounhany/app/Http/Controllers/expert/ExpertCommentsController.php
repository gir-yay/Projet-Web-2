<?php

namespace App\Http\Controllers\expert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentairesSurClient;
use App\Models\CommentairesSurExpert;

class ExpertCommentsController extends Controller
{

    public function store(Request $request)
    {
        $expert = auth()->user();
         $validatedData = $request->validate([
        'note' => 'required|integer',
        'demande_id' => 'required|exists:demandes_clients,id',
        'client_id' => 'required|exists:clients,id',
        'expert_id' => 'required|exists:experts,id',
        'commentaire' => 'required|string|max:255',
    ]);


        $comment = new CommentairesSurClient();
        $comment->demande_id = $validatedData['demande_id'];
        $comment->expert_id = $validatedData['expert_id'];
        $comment->client_id = $validatedData['client_id'];
        $comment->note = $validatedData['note'];
        $comment->commentaire = $validatedData['commentaire'];

        $commentaireSurExpert = CommentairesSurExpert::where('demande_id', $validatedData['demande_id'])->first();
        if($commentaireSurExpert){
            $commentaireSurExpert->afficher = 1;
            $commentaireSurExpert->save();
            $comment->afficher = 1;
        }
        $comment->save();

        toastr()->success('Commentaire ajouté avec succès');

        return redirect()->back();
    }
}

?>
