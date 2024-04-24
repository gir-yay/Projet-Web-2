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
    if ($service->compte_status === 'active') {
        $service->compte_status = 'non active';
    } else {
        $service->compte_status = 'active';
    }

    $service->save();

    return redirect()->back()->with('success', 'Statut du service mis à jour avec succès.');
}
}
