<?php

namespace App\Http\Controllers\expert;

use App\Http\Controllers\Controller;
use App\Mail\CommentMail;
use App\Mail\DemandeMail;
use App\Mail\NotifyDemandeExpert;
use App\Mail\NotifyStatusDemandeClient;
use App\Models\DemandesClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DemandesController extends Controller
{
    public function index()
    {
        $demandes = DemandesClient::where('expert_id', auth('expert')->user()->id)->where('etat', 'en attente')->get();
        return view('expert.demandes', compact('demandes'));
    }

    public function process(Request $request, String $id)
    {
        $demande = DemandesClient::findOrFail($id);
        $client = $demande->client;
        $service_name = $demande->service->nom;
        if ($request->action == 0) {
            $demande->update([
                'etat' => 'refuse'
            ]);

            Mail::to($client->email)->send(new NotifyStatusDemandeClient(
                $client->prenom . " " . $client->nom,
                "Votre demande pour le service " . $service_name . " a été refusée."

            ));

            toastr()->info('Demande refusée avec succès');
        } else {
            $demande->update([
                'etat' => 'accepte'
            ]);

            Mail::to(auth('expert')->user()->email)->send(new DemandeMail(
                auth('expert')->user()->prenom . " " . auth('expert')->user()->nom,
                $demande->client->prenom . " " . $demande->client->nom,
                $demande->client->phone,
                $demande->client->adresse
            ));

            Mail::to($client->email)->send(new NotifyStatusDemandeClient(
                $client->prenom . " " . $client->nom,
                "Votre demande pour le service " . $service_name . " a été acceptée."

            ));

            toastr()->success('Demande acceptée avec succès, veuiilez consulter votre email pour les détails de client.');
        }

        return back();
    }

    public function index_treated()
    {
        $demandes = DemandesClient::with(['client', 'expert', 'service'])->where('etat', '!=', 'en attente')->where('expert_id', auth('expert')->user()->id)->get();
        return view('expert.treated_demandes', compact('demandes'));
    }
}
