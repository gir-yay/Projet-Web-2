<?php

namespace App\Http\Controllers\expert;

use App\Http\Controllers\Controller;
use App\Models\DemandesClient;

class HistoriqueController extends Controller
{
    public function index()
    {
        $demandes = DemandesClient::where('expert_id', auth('expert')->user()->id)->where('etat', 'accepte')->get();
        return view('expert.historique', compact('demandes'));
    }


    public function treated()
    {
        $demandes = DemandesClient::with(['client', 'expert', 'service'])->where('etat', '!=', 'accepte')->where('expert_id', auth('expert')->user()->id)->get();
        return view('expert.treated', compact('demandes'));
       
    
    }
}
