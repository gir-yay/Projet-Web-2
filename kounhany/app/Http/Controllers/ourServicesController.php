<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\ServiceExpert;

class OurServicesController extends Controller{
    public function showServices()
    {
        $serviceExpert = ServiceExpert::whereHas('expert', function ($query) {
            $query->where('compte_status', 'active')
                ->where('status_abonnement', 1);
        })->paginate(6);

        return view('user/client/services',compact('serviceExpert'));


    }





}