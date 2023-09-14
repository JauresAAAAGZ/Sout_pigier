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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all();
       
        return view('admin.Etudiants.index', compact('etudiants',))->with('message', 'Operation reussi');
               

    }
    public function allpv()
    {
        $etudiants = Etudiant::all();
       
        return view('admin.Etudiants.charts1', compact('etudiants',));
               

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
        $validatedData = $request->validate([
            'Matricule'=> 'required|unique:etudiants|min:3|max:100',
            'Date_Naissance' => 'date',
            'Nom' => 'required|min:3|max:100',
            'Prenom' => 'required|min:3|max:100',
            'Niveau_Etude' => 'required|min:6', 
        ]);
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

        return redirect()->route('etudiants.index')->with('message', 'L\'Etudiant a été creé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        //$nom_filiere = Filiere::find($etudiant->filiere_id)->Intitule_Filiere;
        //$nom_memoire = Memoire::find($etudiant->memoire_id)->Theme;
        //$date_soutenance = Soutenance::find($etudiant->soutenance_id)->Date_Soutenance;
        //$nom_professeur=Professeur::find($etudiant->professeur_id)->Nom_Professeur;
        //$nom_jury=Jurys::find($etudiant->jury_id)->NumJury;
        return view('admin.Etudiants.show', compact('etudiant'));
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
        $validatedData = $request->validate([
            'Matricule'=> 'required|min:3|max:100',
            'Date_Naissance' => 'date',
            'Nom' => 'required|min:3|max:100',
            'Prenom' => 'required|min:3|max:100',
            'Niveau_Etude' => 'required|min:6', 
        ]);
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

        return redirect()->route('etudiants.show', $etudiants)->with('message1', 'L\'étudiant a été modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
       
                     
            // Vérifiez si le champ de confirmation est défini
            if (request()->has('confirmation')) {
                // Supprimez l'étudiant
                $etudiant->delete();
        
                // Redirigez l'utilisateur avec un message de confirmation
                return redirect()->route('etudiants.index')->with('danger', 'L\'étudiant a été supprimé avec succès.');
            } else {
                // Redirigez l'utilisateur avec un message d'erreur
                return redirect()->route('etudiants.index')->with('error', 'La suppression n\'a pas été confirmée.');
            }
        
        
    }


    public function infopv(Etudiant $etudiant)
    {
        /*$nom_filiere = Filiere::find($etudiant->filiere_id)->Intitule_Filiere;
        $nom_memoire = Memoire::find($etudiant->memoire_id)->Theme;
        $date_soutenance = Soutenance::find($etudiant->soutenance_id)->Date_Soutenance;
        $nom_professeur=Professeur::find($etudiant->professeur_id)->Nom_Professeur;
        $nom_jury=Jurys::find($etudiant->jury_id)->NumJury;*/
        return view('admin.Etudiants.charts', compact('etudiant'));
    }

    


 
}
