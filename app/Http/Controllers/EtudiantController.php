<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('admin.Etudiants.index', compact('etudiants'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etudiants=Etudiant::all();
        return view('admin.Etudiants.create', compact("etudiants"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEtudiantRequest $request)
    {
        $etudiants = new Etudiant();
        $etudiants->Matricule = $request->Matricule;
        $etudiants->Nom = $request->Nom;
        $etudiants->Prenom = $request->Prenom;
        $etudiants->Niveau_Etude = $request->Niveau_Etude;
        $etudiants->Date_Naissance = $request->Date_Naissance;
        $etudiants->save();

        return redirect()->route('etudiants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        return view('admin.Etudiants.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        return view('admin.Etudiants.edit', compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtudiantRequest $request, Etudiant $etudiant)
    {
        $etudiants = Etudiant::find($etudiant->id);
        $etudiants->Matricule = $request->Matricule;
        $etudiants->Nom = $request->Nom;
        $etudiants->Prenom = $request->Prenom;
        $etudiants->Niveau_Etude = $request->Niveau_Etude;
        $etudiants->Date_Naissance = $request->Date_Naissance;
        $etudiants->save();

        return redirect()->route('etudiants.show', $etudiants);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiants.index');
    }
}
