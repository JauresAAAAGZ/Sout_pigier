<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use App\Http\Requests\StoreProfesseurRequest;
use App\Http\Requests\UpdateProfesseurRequest;
use App\Models\Jurys;

class ProfesseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professeurs = Professeur::all();
        return view('admin.Professeurs.index', compact('professeurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $professeurs=Professeur::all();
        //$jurys=Jurys::all();
        return view('admin.Professeurs.create', compact("professeurs"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfesseurRequest $request)
    {
        $professeurs = new Professeur();
        $professeurs->Nom_Professeur = $request->Nom_Professeur;
        $professeurs->Prenom_Professeur = $request->Prenom_Professeur;
        $professeurs->Grade = $request->Grade;
        
        $professeurs->save();

       // $professeurs->jurys()->sync($request->jurys);

        return redirect()->route('professeurs.index')->with('message', 'Operation reussi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Professeur $professeur)
    {
       
        return view('admin.Professeurs.show', compact('professeur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professeur $professeur)
    {
        //$jurys=Jurys::all();
        return view('admin.Professeurs.edit', compact('professeur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfesseurRequest $request, Professeur $professeur)
    {
        $professeurs = Professeur::find($professeur->id);
        $professeurs->Nom_Professeur = $request->Nom_Professeur;
        $professeurs->Prenom_Professeur = $request->Prenom_Professeur;
        $professeurs->Grade = $request->Grade;
       

        $professeurs->save();

        $professeurs->jurys()->sync($request->jurys);

        return redirect()->route('professeurs.show', $professeurs);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professeur $professeur)
    {
        $professeur->delete();
        return redirect()->route('professeurs.index');
    }
}
