<?php

namespace App\Http\Controllers;

use App\Models\ServiceExpert;

use App\Models\CommentairesSurExpert;
use App\Models\Expert;

use Illuminate\Http\Request;

class ExperdetailtController extends Controller
{
    public function showAllServices()
    {
        $services = ServiceExpert::with('expert', 'service')->get();
        
        return view('all_services', compact('services'));
    }

    public function showExpertDetails($expertId, $serviceId)
    {
      
        $expert = Expert::findOrFail($expertId);
    
        // Récupérer les détails du service expert
        $serviceExpert = ServiceExpert::where('expert_id', $expertId)->where('service_id', $serviceId)->first();

        // Récupérer les détails du service associé
    


        $comments = CommentairesSurExpert::with('client')->where('expert_id', $expertId)->get();

       
        return view('user.client.expert_detail', compact('expert', 'serviceExpert', 'comments'));
    }
}