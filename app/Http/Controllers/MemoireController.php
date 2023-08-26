<?php

namespace App\Http\Controllers;

use App\Models\Memoire;
use App\Http\Requests\StoreMemoireRequest;
use App\Http\Requests\UpdateMemoireRequest;

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
        return view('admin.Memoires.create', compact("memoires"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemoireRequest $request)
    {
        $memoires = new Memoire();
        $memoires->Theme = $request->Theme;
        $memoires->Nombre_Pages = $request->Nombre_Pages;
        $memoires->Date_Depot = $request->Date_Depot;
       
        $memoires->save();

        return redirect()->route('memoires.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Memoire $memoire)
    {
        return view('admin.Etudiants.show', compact('memoire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Memoire $memoire)
    {
        return view('admin.Etudiants.edit', compact('memoire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemoireRequest $request, Memoire $memoire)
    {
        $memoires = Memoire::find($memoire->id);
        $memoires->Theme = $request->Theme;
        $memoires->Nombre_Pages = $request->Nombre_Pages;
        $memoires->Date_Depot = $request->Date_Depot;
       
        $memoires->save();

        return redirect()->route('memoires.show', $memoires);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Memoire $memoire)
    {
        $memoire->delete();
        return redirect()->route('memoires.index');
    }
}
