<?php

namespace App\Http\Controllers\expert;

use App\Http\Controllers\Controller;
use App\Models\CommentairesSurExpert;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    public function index(){
        $comments = CommentairesSurExpert::where("expert_id", auth()->user()->id)->get();
        return view("expert.avis", compact("comments"));
    }
}
