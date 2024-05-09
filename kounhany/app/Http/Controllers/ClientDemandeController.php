<?php

namespace App\Http\Controllers;

use App\Models\CommentairesSurClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DemandesClient;
use Carbon\Carbon;

class ClientDemandeController extends Controller
{
    public function show()
    {
       $client = auth()->user(); // Assuming the authenticated user is a client

        $demandes = DemandesClient::where('client_id', $client->id)
            ->with(['client', 'expert', 'service'])
            ->get();
        $demandeesCollection = $demandes->filter(function ($demande) {
            return $demande->etat == 'en attente' && $demande->created_at > now()->subHours(48) ||
                $demande->etat == 'accepte' || $demande->etat == 'refuse';
        });
        $demandes = $demandeesCollection;

        $transformedDemandes = $demandes->map(function ($demande) {
            return [
                'demande_id' => $demande->id,
                'client_id' => $demande->client->id,
                'expert_id' => $demande->expert->id,
                'email' => $demande->expert->email ,
                'service' => $demande->service->nom,
                'date_debut' => $demande->date_debut,
                'duree' => $demande->duree,
                'total' => $demande->total,
                'etat' => $demande->etat,
            ];
        });

        return view('user.client.mesdemandes', compact('transformedDemandes'));
    }


}
