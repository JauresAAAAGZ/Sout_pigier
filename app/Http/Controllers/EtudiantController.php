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
        try{
        $etudiants = Etudiant::all();
       
        return view('admin.Etudiants.index', compact('etudiants',))->with('message', 'Operation reussi');
               
    }
    catch(\Exception $e){
        return view('admin.Etudiants.index', compact('etudiants',))->with('error', 'Operation echoue!');
     }
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
        try{
        $etudiants=Etudiant::all();
        $filieres=Filiere::all();
        $memoires=Memoire::all();
        $soutenances=Soutenance::all();
        $professeurs=Professeur::all();
        $jurys=Jurys::all();
        return view('admin.Etudiants.create', compact("etudiants", "filieres", "memoires","soutenances" ,"professeurs","jurys"));
    }
    catch(\Exception $e){
       return redirect(route('etudiants.index'))->with('error', 'Operation echoue!');
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEtudiantRequest $request)
    {
      try{
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
    catch(\Exception $e){
        return redirect()->route('etudiants.index')->with('error', 'L\'Etudiant n\'a pas été creé');
    }
}
    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        try{
        //$nom_filiere = Filiere::find($etudiant->filiere_id)->Intitule_Filiere;
        //$nom_memoire = Memoire::find($etudiant->memoire_id)->Theme;
        //$date_soutenance = Soutenance::find($etudiant->soutenance_id)->Date_Soutenance;
        //$nom_professeur=Professeur::find($etudiant->professeur_id)->Nom_Professeur;
        //$nom_jury=Jurys::find($etudiant->jury_id)->NumJury;
        return view('admin.Etudiants.show', compact('etudiant'));
    }
    catch(\Exception $e){
       return redirect(route('etudiants.index'))->with('error', 'Operation echoue!');
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        try{
        $filieres = Filiere::all();
        $soutenances=Soutenance::all();
        $memoires=Memoire::all();
        $professeurs=Professeur::all();
        $jurys=Jurys::all();
        return view('admin.Etudiants.edit', compact('etudiant', 'filieres', 'memoires','soutenances', 'professeurs','jurys'));
    }
    catch(\Exception $e){
       return redirect(route('etudiants.index'))->with('error', 'Operation echoue!');
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtudiantRequest $request, Etudiant $etudiant)
    {
        try{
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
    catch(\Exception $e){
       return redirect(route('etudiants.index'))->with('error', 'Operation echoue!');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
       
        try{         
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
        catch(\Exception $e){
           return redirect(route('etudiants.index'))->with('error', 'Operation echoue!');
        }
        
    }


    public function infopv(Etudiant $etudiant)
    {
        try{
        /*$nom_filiere = Filiere::find($etudiant->filiere_id)->Intitule_Filiere;
        $nom_memoire = Memoire::find($etudiant->memoire_id)->Theme;
        $date_soutenance = Soutenance::find($etudiant->soutenance_id)->Date_Soutenance;
        $nom_professeur=Professeur::find($etudiant->professeur_id)->Nom_Professeur;
        $nom_jury=Jurys::find($etudiant->jury_id)->NumJury;*/
        return view('admin.Etudiants.charts', compact('etudiant'));
    }
    catch(\Exception $e) {
        return view('admin.Etudiants.charts', compact('etudiant'))->with('error', 'Erreur');
    }

}
}