<?php

namespace App\Http\Controllers\expert;

use App\Http\Controllers\Controller;
use App\Models\CommentairesSurExpert;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    public function index()
    {
        $comments = CommentairesSurExpert::where("expert_id", auth()->user()->id)
        ->get();
        $newCommentsCollection = $comments->filter(function($comment){
            $dateDebut = \Carbon\Carbon::parse($comment->demande->date_debut);
            $endDate = $dateDebut->addDays($comment->demande->duree);
            $endDatePlus7Days = $endDate->addDays(7);

            return $endDatePlus7Days <= now() ||  $comment->afficher == 1;
            ;
        });

        $comments = $newCommentsCollection->all();

        return view("expert.avis", compact("comments"));
    }
}
// $passWeek = now() >= $query->date_debut->addDays($query->duree)->addDays(7);
