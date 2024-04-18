<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;

use Illuminate\Http\Request;
class ShowOurclient extends Controller
{
    public function index()
    {
       // Récupérer tous les clients
       $clients = Client::all();
        
       // Passer les clients à la vue
       return view('admin.ourclients', compact('clients'));
    }
}