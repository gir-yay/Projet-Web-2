<?php
namespace App\Http\Controllers;
use App\Models\DemandesClient;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DemandesClientController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données soumises si nécessaire

        // Récupérer les données du formulaire
        
        $dateDebut = Carbon::createFromFormat('Y-m-d', $request->input('date_debut'));
        $description = $request->input('description');
        $duree = $request->input('duree');

        // Vérifier si la date de début est supérieure à la date actuelle
        if ($dateDebut->isPast()) {
            toastr()->error('La date de début doit être dans le futur');
            return redirect()->back();
        }

        // Récupérer l'expert ID et le service ID à partir des champs cachés dans le formulaire
        $expertId = $request->input('expert_id');
        $serviceId = $request->input('service_id');
        
        $prixParDuree = $request->input('prix_par_duree');


        // Calculer le total en fonction du nombre de jours et du prix par durée du service
       
         $total = $duree * $prixParDuree;



         $demandesExistantes = DemandesClient::where('expert_id', $expertId)->get();

         foreach ($demandesExistantes as $demandeExistante) {
            // Calculer la date de fin de la demande existante
            $dateFinDemandeExistante = Carbon::parse($demandeExistante->date_debut)->addDays($demandeExistante->duree);
        
            // Vérifier si la date de début de la nouvelle demande est postérieure à la date de fin de la demande existante
            // ou si la date de fin de la nouvelle demande est antérieure à la date de début de la demande existante
            if ($dateDebut >= $dateFinDemandeExistante || Carbon::parse($dateDebut)->addDays($duree) <= Carbon::parse($demandeExistante->date_debut)) {
                continue; // Pas de chevauchement, passer à la demande suivante
            }
        
            // Il y a un chevauchement, retourner une erreur
            toastr()->error('L\'expert a déjà des demandes pendant cette période');
            return redirect()->back();
  }

        // Créer une nouvelle instance de DemandesClient avec les données récupérées
        $demande = new DemandesClient();
        $demande->client_id = 1;
        $demande->expert_id = $expertId;
        $demande->service_id = $serviceId;
        $demande->date_debut = $dateDebut;
        $demande->description = $description;
        $demande->duree = $duree;
        $demande->total = $total;
        $demande->etat = 'en attente'; // Valeur par défaut pour l'état

        // Sauvegarder la demande dans la base de données
        $demande->save();

        // Rediriger ou renvoyer une réponse appropriée
        // Par exemple, rediriger l'utilisateur vers une autre page
        toastr()->success('Votre Demande soumise avec succès.');
        return redirect()->route('expert-detail', ['expertId' => $expertId, 'serviceId' => $serviceId]);
    }
}
