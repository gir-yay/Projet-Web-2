<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Expert;

use Illuminate\Http\Request;
class ExpertController extends Controller
{
    public function toggleStatus($id)
    {
        $expert = Expert::findOrFail($id);
    
        if ($expert->compte_status === 'active') {
            $expert->compte_status = 'non active';
        } else {
            $expert->compte_status = 'active';
        }
    
        $expert->save();
    
        return redirect()->back()->with('success', 'Statut de l\'expert mis à jour avec succès.');
    }
}