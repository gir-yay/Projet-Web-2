<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;

use Illuminate\Http\Request;
class ClientController extends Controller
{
    public function toggleStatus($id)
{
    $client = Client::findOrFail($id);

    // Inversion du statut
    if ($client->compte_status === 'active') {
        $client->compte_status = 'non active';
    } else {
        $client->compte_status = 'active';
    }

    $client->save();

    return redirect()->back()->with('success', 'Statut du client mis à jour avec succès.');
}
}