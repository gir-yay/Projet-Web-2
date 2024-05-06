<?php

namespace App\Http\Controllers;

use App\Models\CommentairesSurClient;
use Illuminate\Http\Request;

class ExpertAvisController extends Controller
{
    public function index(){
        $comments = CommentairesSurClient::where("client_id", auth()->user()->id)->get();
        return view("user.client.avis", compact("comments"));
    }
}
