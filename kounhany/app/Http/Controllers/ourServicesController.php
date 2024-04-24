<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CommentairesSurExpert;
use App\Models\Expert;
use App\Models\ServiceExpert;
use Illuminate\Http\Request;

class OurServicesController extends Controller{
    public function showServices()
    {
        $serviceExpert = ServiceExpert::whereHas('expert', function ($query) {
            $query->where('compte_status', 'active')
                ->where('status_abonnement', 1);
        })->paginate(6);

        return view('user/client/services',compact('serviceExpert'));


    }
    public function searchByPrice(Request $request){
        
        $prix = $request->input('prix');
    
        $serviceExpert = ServiceExpert::whereHas('expert', function ($query) use ($prix) {
            $query->where('compte_status', 'active')
            ->where('status_abonnement', 1)
            ->where('prix_par_duree', $prix);
        })->paginate(20);
    
        return view('user/client/services', compact('serviceExpert'));
    }

    public function searchByCity(Request $request){
        
        $ville = $request->input('ville');
    
        $serviceExpert = ServiceExpert::whereHas('expert', function ($query) use ($ville) {
            $query->where('compte_status', 'active')
            ->where('status_abonnement', 1)
            ->where('ville', $ville);
        })->paginate(20);
    
        return view('user/client/services', compact('serviceExpert'));
    }

    public function searchByRating(Request $request)
{
    $note = $request->input('note');

    // Implémentez la logique pour récupérer les services avec la note sélectionnée
    $serviceExpert = CommentairesSurExpert::where('note', $note)->paginate(20);

    return view('user/client/services', compact('serviceExpert'));
}

    public function filtreParCat($cat){
        $serviceExpert = ServiceExpert::whereHas('expert', function ($query) {
            $query->where('compte_status', 'active')
                ->where('status_abonnement', 1);
        })->where('service_id', $cat)->paginate(6);

        return view('user/client/services',compact('serviceExpert'));
    }





}