<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Expert;

class OurServicesController extends Controller{
public function showServices()
{
    $experts = Expert::all(); 
    

    return view('user.client.services', ['experts' => $experts]);
}
}