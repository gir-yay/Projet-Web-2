<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Expert;
use App\Models\Service;


use Illuminate\Http\Request;
class StatistiqueController extends Controller
{
    public function index()
    {
        $totalClients = Client::count();
        $totalExperts = Expert::count();
        $totalServices = Service::count();
    
        return view('admin.dashboard', compact('totalClients', 'totalExperts','totalServices'));
    }
}