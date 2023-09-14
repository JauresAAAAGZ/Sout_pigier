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
        $validatedData = $request->validate([
            'Nom_Soutenance'=>'required|unique:soutenances|min:12|max:100',
            'Date_Soutenance'=>'required', 
            'Heure_Soutenance'=>'required', 
            'Salle_Soutenance'=>'required|min:7|max:100'
        ]);
        $soutenances->Nom_Soutenance = $request->Nom_Soutenance;
        $soutenances->Date_Soutenance = $request->Date_Soutenance;
        $soutenances->Heure_Soutenance = $request->Heure_Soutenance;
        $soutenances->Salle_Soutenance = $request->Salle_Soutenance;
       
        $soutenances->save();

        return redirect()->route('soutenances.index')->with('message', 'Operation reussi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Soutenance $soutenance)
    {
        return view('admin.Soutenances.show', compact('soutenance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soutenance $soutenance)
    {
        return view('admin.Soutenances.edit', compact('soutenance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSoutenanceRequest $request, Soutenance $soutenance)
    {
        $soutenances = Soutenance::find($soutenance->id);
        $validatedData = $request->validate([
            'Nom_Soutenance'=>'required|min:12|max:100',
            'Date_Soutenance'=>'required', 
            'Heure_Soutenance'=>'required', 
            'Salle_Soutenance'=>'required|min:7|max:100'
        ]);
        $soutenances->Nom_Soutenance = $request->Nom_Soutenance;
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

    public function info()
    {
        
        $soutenances = Soutenance::all();
        
        
        return view('admin.Soutenances.info', compact('soutenances'));
    }

}
