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
        $totalDemandesT = DemandesClient::where('etat','!=','en attente')->count();
        $totalDemandesNT = DemandesClient::where('etat','=', 'en attente')->count();
        $totalDemandes = DemandesClient::count();
        $totalCommentairesC= CommentairesSurClient::count();
        $totalCommentairesE=CommentairesSurExpert::count();
        $totalRevenus = DemandesClient::where('etat', 'accepte')->sum('total');

        return view('admin.dashboard', compact('totalClients', 'totalExperts','totalServices','totalDemandesT','totalDemandesNT','totalDemandes','totalCommentairesC','totalCommentairesE','totalRevenus'));
    }
}
