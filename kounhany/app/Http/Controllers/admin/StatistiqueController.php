<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\CommentairesSurClient;
use App\Models\CommentairesSurExpert;
use App\Models\Expert;
use App\Models\Service;
use App\Models\DemandesClient;

use Illuminate\Http\Request;
class StatistiqueController extends Controller
{
    public function index()
    {
        $totalClients = Client::count();
        $totalExperts = Expert::count();
        $totalServices = Service::count();
        $totalDemandesT = DemandesClient::where('etat', 'traitee')->count();
        $totalDemandesNT = DemandesClient::where('etat', 'non_traitee')->count();
        $totalDemandes = DemandesClient::count();
        $totalCommentairesC= CommentairesSurClient::count();
        $totalCommentairesE=CommentairesSurExpert::count();
        $totalRevenus = DemandesClient::where('etat', 'traitee')->sum('total');
    
        return view('admin.dashboard', compact('totalClients', 'totalExperts','totalServices','totalDemandesT','totalDemandesNT','totalDemandes','totalCommentairesC','totalCommentairesE','totalRevenus'));
    }
}
