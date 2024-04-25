<?php

namespace App\Http\Controllers\expert;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceExpert;
use Illuminate\Http\Request;

class DomainesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $domaines = ServiceExpert::where("expert_id", auth()->user()->id)->get();
        $countActive = ServiceExpert::where("expert_id", auth()->user()->id)->count();


        return view('expert.domaines.index', compact('domaines', 'countActive'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $serviceExpert = ServiceExpert::where("expert_id", auth()->user()->id)->get();
        if (auth('expert')->user()->serviceExpert->count() == 3) {
            toastr()->error("Vous avez atteint le nombre maximal de domaines");
            return redirect()->route('expert.domaines.index');
        }
        $services = Service::whereNotIn('id', $serviceExpert->pluck('service_id'))->get();

        return view('expert.domaines.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'service_id' => 'required',
            'nbr_annee_d_exp' => 'required',
            'description' => 'required',
            'prix_par_duree' => 'required|numeric',
            'ville' => 'required',
        ]);


        ServiceExpert::create([
            'expert_id' => auth()->user()->id,
            'service_id' => $request->service_id,
            'nbr_annee_d_exp' => $request->nbr_annee_d_exp,
            'disponibilite' => $request->description,
            'duree' => 'jour',
            'prix_par_duree' => $request->prix_par_duree,
            'ville' => $request->ville,
            'status_' => $request->status_
        ]);
        toastr()->success("Domaine ajouté avec succès");
        return redirect()->route('expert.domaines.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $domaine = ServiceExpert::findOrFail($id);
        if($domaine->expert_id != auth('expert')->user()->id)
           abort(404);
        return view('expert.domaines.edit', compact('domaine'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nbr_annee_d_exp' => 'required',
            'description' => 'required',
            'prix_par_duree' => 'required|numeric',
            'ville' => 'required',
        ]);


        $serviceExpert = ServiceExpert::findOrFail($id);


        $serviceExpert->update([
            'expert_id' => auth()->user()->id,
            'nbr_annee_d_exp' => $request->nbr_annee_d_exp,
            'disponibilite' => $request->description,
            'duree' => 'jour',
            'prix_par_duree' => $request->prix_par_duree,
            'ville' => $request->ville,
            'status_' => $request->status_
        ]);
        toastr()->success("Domaine changé avec succès");
        return redirect()->route('expert.domaines.index');
    }


    public function switch_status(string $id)
    {
        $serviceExpert = ServiceExpert::find($id);

        $new_status = $serviceExpert->status_ == "active" ? "non active" : "active";
        $serviceExpert->update([
            'status_' => $new_status
        ]);

        toastr()->success("Statut changé avec succès");
        return redirect()->route('expert.domaines.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
