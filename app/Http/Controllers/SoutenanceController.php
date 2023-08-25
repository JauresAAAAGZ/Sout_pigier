<?php

namespace App\Http\Controllers;

use App\Models\Soutenance;
use App\Http\Requests\StoreSoutenanceRequest;
use App\Http\Requests\UpdateSoutenanceRequest;

class SoutenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $soutenances = Soutenance::all();
        return view('admin.Soutenances.index', compact('soutenances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $soutenances=Soutenance::all();
        return view('admin.Soutenances.create', compact("soutenances"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSoutenanceRequest $request)
    {
        $soutenances = new Soutenance();
        $soutenances->Date_Soutenance = $request->Date_Soutenance;
        $soutenances->Heure_Soutenance = $request->Heure_Soutenance;
        $soutenances->Salle_Soutenance = $request->Salle_Soutenance;
       
        $soutenances->save();

        return redirect()->route('soutenances.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Soutenance $soutenance)
    {
        return view('admin.Etudiants.show', compact('soutenance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soutenance $soutenance)
    {
        return view('admin.Etudiants.edit', compact('soutenance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSoutenanceRequest $request, Soutenance $soutenance)
    {
        $soutenances = Soutenance::find($soutenance->id);
        $soutenances->Date_Soutenance = $request->Date_Soutenance;
        $soutenances->Heure_Soutenance = $request->Heure_Soutenance;
        $soutenances->Salle_Soutenance = $request->Salle_Soutenance;
       
        $soutenances->save();

        return redirect()->route('soutenances.show', $soutenances);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soutenance $soutenance)
    {
        $soutenance->delete();
        return redirect()->route('soutenances.index');
    }
}
