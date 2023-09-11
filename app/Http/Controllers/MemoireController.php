<?php

namespace App\Http\Controllers;

use App\Models\Memoire;
use App\Http\Requests\StoreMemoireRequest;
use App\Http\Requests\UpdateMemoireRequest;
use App\Models\Jurys;

class MemoireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memoires = Memoire::all();
        return view('admin.Memoires.index', compact('memoires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $memoires=Memoire::all();
        $jurys=Jurys::all();
        return view('admin.Memoires.create', compact("memoires","jurys"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemoireRequest $request)
    {
        $memoires = new Memoire();
        $validatedData = $request->validate([
            'Theme'=>'required|unique:memoires|min:6|max:100',
            
            'Date_Depot'=>'required',
        ]);
        $memoires->Theme = $request->Theme;
        $memoires->Nombre_Pages = $request->Nombre_Pages;
        $memoires->Date_Depot = $request->Date_Depot;
        $memoires->jury_id=$request->jury_id;
       
        $memoires->save();

        return redirect()->route('memoires.index')->with('message', 'L\'Enregistrement de la memoire a reussi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Memoire $memoire)
    {
        //$nom_jury=Jurys::find($memoire->jury_id)->NumJury;
        return view('admin.Memoires.show', compact('memoire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Memoire $memoire)
    {
        $jurys=Jurys::all();
        return view('admin.Memoires.edit', compact('memoire','jurys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemoireRequest $request, Memoire $memoire)
    {
        $memoires = Memoire::find($memoire->id);
        $validatedData = $request->validate([
            'Theme'=>'required|min:6|max:100',
            
            'Date_Depot'=>'required'
            
        ]);
        $memoires->Theme = $request->Theme;
        $memoires->Nombre_Pages = $request->Nombre_Pages;
        $memoires->Date_Depot = $request->Date_Depot;
        $memoires->jury_id=$request->jury_id;
       
        $memoires->save();

        return redirect()->route('memoires.show', $memoires)->with('message1', 'Le Memoire  a été modifié avec succès.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Memoire $memoire)
    {
        $memoire->delete();
        return redirect()->route('memoires.index')->with('danger', 'Le Memoire a été supprimé avec succès.');;
    }
}
