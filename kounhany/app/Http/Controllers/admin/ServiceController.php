<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function toggleStatus($id)
{
    $service = Service::findOrFail($id);

    // Inversion du statut
    if ($service->service_status === 'active') {
        $service->service_status = 'non active';
    } else {
        $service->service_status = 'active';
    }

    $service->save();

    return redirect()->back()->with('success', 'Statut du service mis à jour avec succès.');
}


public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:32',
        ]);
        $service = new Service();
        $service->nom = $request->input('nom');
        $service->service_status = 'active';
    
        $service->save();

        return redirect()->back()->with('success', 'Comment stored successfully!');
    }

}
