<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Expert;

use Illuminate\Http\Request;
class ShowOurexpert extends Controller
{
    public function index()
    {
       // Récupérer tous les clients
       $experts = Expert::all();
        
       // Passer les clients à la vue
       return view('admin.ourexperts', compact('experts'));
    }
}