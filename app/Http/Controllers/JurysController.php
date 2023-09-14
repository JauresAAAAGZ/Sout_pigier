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
        $jurys = new Jurys();
        $validatedData = $request->validate([
            'NumJury'=>'required|unique:jurys|min:6|max:100',
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

        return redirect()->route('jurys.index')->with('message', 'Operation reussi!');
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

        return redirect()->route('jurys.show', $jurys);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurys $jurys)
    {
        $jurys->delete();
        return redirect()->route('jurys.index');
    }
}
