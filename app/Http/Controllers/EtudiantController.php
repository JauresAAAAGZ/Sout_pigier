<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Requests\UpdateEtudiantRequest;
use App\Models\Filiere;
use App\Models\Jurys;
use App\Models\Memoire;
use App\Models\Professeur;
use App\Models\Soutenance;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all();
       
        return view('admin.Etudiants.index', compact('etudiants',));
               

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etudiants=Etudiant::all();
        $filieres=Filiere::all();
        $memoires=Memoire::all();
        $soutenances=Soutenance::all();
        $professeurs=Professeur::all();
        $jurys=Jurys::all();
        return view('admin.Etudiants.create', compact("etudiants", "filieres", "memoires","soutenances" ,"professeurs","jurys"));
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
        $etudiants->Lieu_Naissance = $request->Lieu_Naissance;
        $etudiants->filiere_id=$request->filiere_id;
        $etudiants->memoire_id=$request->memoire_id;
        $etudiants->soutenance_id=$request->soutenance_id;
        $etudiants->professeur_id=$request->professeur_id;
        $etudiants->jury_id=$request->jury_id;
        $etudiants->save();

        return redirect()->route('etudiants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        $nom_filiere = Filiere::find($etudiant->filiere_id)->Intitule_Filiere;
        $nom_memoire = Memoire::find($etudiant->memoire_id)->Theme;
        $date_soutenance = Soutenance::find($etudiant->soutenance_id)->Date_Soutenance;
        $nom_professeur=Professeur::find($etudiant->professeur_id)->Nom_Professeur;
        $nom_jury=Jurys::find($etudiant->jury_id)->NumJury;
        return view('admin.Etudiants.show', compact('etudiant', 'nom_filiere', 'nom_memoire','date_soutenance', 'nom_professeur','nom_jury'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $filieres = Filiere::all();
        $soutenances=Soutenance::all();
        $memoires=Memoire::all();
        $professeurs=Professeur::all();
        $jurys=Jurys::all();
        return view('admin.Etudiants.edit', compact('etudiant', 'filieres', 'memoires','soutenances', 'professeurs','jurys'));
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
        $etudiants->Lieu_Naissance = $request->Lieu_Naissance;
        $etudiants->filiere_id = $request->filiere_id;
        $etudiants->memoire_id=$request->memoire_id;
        $etudiants->soutenance_id=$request->soutenance_id;
        $etudiants->professeur_id=$request->professeur_id;
        $etudiants->jury_id=$request->jury_id;
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


    public function infopv(Etudiant $etudiant)
    {
        $nom_filiere = Filiere::find($etudiant->filiere_id)->Intitule_Filiere;
        $nom_memoire = Memoire::find($etudiant->memoire_id)->Theme;
        $date_soutenance = Soutenance::find($etudiant->soutenance_id)->Date_Soutenance;
        $nom_professeur=Professeur::find($etudiant->professeur_id)->Nom_Professeur;
        $nom_jury=Jurys::find($etudiant->jury_id)->NumJury;
        return view('admin.Etudiants.charts', compact('etudiant', 'nom_filiere', 'nom_memoire','date_soutenance', 'nom_professeur','nom_jury'));
    }
}
