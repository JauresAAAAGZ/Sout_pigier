<?php

namespace App\Http\Controllers;

use App\Models\Jurys;
use App\Http\Requests\StoreJurysRequest;
use App\Http\Requests\UpdateJurysRequest;
use App\Models\Professeur;

class JurysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurys = Jurys::all();
        return view('admin.jurys.index', compact('jurys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurys=Jurys::all();
        $professeurs=Professeur::all();
        return view('admin.jurys.create', compact("jurys", "professeurs"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJurysRequest $request)
    {
        
        $validatedData = $request->validate([
            'NumJury'=>'required|unique:jurys|min:6|max:100',
            'President'=>'required',
            'Examinateur'=>'required', 
            'Rapporteur'=>'required'
        ]);
        // Récupérez les professeurs sélectionnés
    $NumJury = $request->NumJury;
    $presidentId = $request->input('President');
    $rapporteurId = $request->input('Rapporteur');
    $examinateurId = $request->input('Examinateur');

    // Vérifiez si les professeurs sont tous différents
    if ($presidentId !== $rapporteurId && $presidentId !== $examinateurId && $rapporteurId !== $examinateurId) {
        // Créez le jury
        $jurys = new Jurys();
        $jurys->NumJury=$NumJury;
        $jurys->President = $presidentId;
        $jurys->Rapporteur = $rapporteurId;
        $jurys->Examinateur = $examinateurId;
        $jurys->save();
        $jurys->professeurs()->sync($request->professeurs);

        return redirect()->route('jurys.index')->with('message', 'Le Jury a été creé avec sucess');
        // Redirigez ou effectuez d'autres actions
    } else {
        // Les professeurs sélectionnés sont les mêmes, retournez une erreur
        return redirect()->route('jurys.create')->with('message2', 'Les professeurs sélectionnés doivent être différents pour chaque rôle.');
    }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurys $jurys)
    {
        //dd($jurys->president->Nom_Professeur,$jurys->president->Grade);
        return view('admin.jurys.show', compact('jurys'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurys $jurys)
    {
        $professeurs=Professeur::all();
  
        return view('admin.jurys.edit', compact('jurys','professeurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJurysRequest $request, Jurys $jurys)
    {
        /*if ($request->ajax()) {
            Jurys::find($request->pk)->update([
           $request->name => $request->value
        ]);
            return response()->json(['success' => true]);
    }*/


        $jurys = Jurys::find($jurys->id);
        $validatedData = $request->validate([
            'NumJury'=>'required|min:6|max:100',
            'President'=>'required',
            'Examinateur'=>'required', 
            'Rapporteur'=>'required'
        ]);
        $jurys->NumJury = $request->NumJury;
        $jurys->President = $request->President;
        $jurys->Examinateur = $request->Examinateur;
        $jurys->Rapporteur = $request->Rapporteur;
        $jurys->save();

        $jurys->professeurs()->sync($request->professeurs);

        return redirect()->route('jurys.show', $jurys)->with('message1', 'Le Jury a été modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurys $jurys)
    {
        $jurys->delete();
        return redirect()->route('jurys.index')->with('danger', 'Le Jury a été supprimé avec succès.');;
    }
}
