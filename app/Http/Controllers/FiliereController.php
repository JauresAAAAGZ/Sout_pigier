<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Http\Requests\StoreFiliereRequest;
use App\Http\Requests\UpdateFiliereRequest;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filieres = Filiere::all();
        return view('admin.Filieres.index', compact('filieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filieres=Filiere::all();
        return view('admin.Filieres.create', compact("filieres"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFiliereRequest $request)
    {
        $filieres = new Filiere();
        $filieres->Intitule_Filiere = $request->Intitule_Filiere;
        $filieres->Niveau_Filiere = $request->Niveau_Filiere;
       
       
        $filieres->save();

        return redirect()->route('filieres.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Filiere $filiere)
    {
        return view('admin.Etudiants.show', compact('filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filiere $filiere)
    {
        return view('admin.Etudiants.edit', compact('filiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFiliereRequest $request, Filiere $filiere)
    {
        $filieres = Filiere::find($filiere->id);
        $filieres->Intitule_Filiere = $request->Intitule_Filiere;
        $filieres->Niveau_Filiere = $request->Niveau_Filiere;
       
        $filieres->save();

        return redirect()->route('filieres.show', $filieres);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return redirect()->route('filieres.index');
    }
}
