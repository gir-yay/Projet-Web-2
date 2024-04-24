<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;

use Illuminate\Http\Request;
class ShowOurservice extends Controller
{
    public function index()
    {
       // Récupérer tous les service
       $services = Service::all();
        
       // Passer les clients à la vue
       return view('admin.ourservices', compact('services'));
    }
}