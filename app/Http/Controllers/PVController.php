<?php

namespace App\Http\Controllers;

use App\Models\PV;
use App\Http\Requests\StorePVRequest;
use App\Http\Requests\UpdatePVRequest;

class PVController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pvs = Pv::all();
        return view('admin.Pvs.index', compact('pvs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pvs=Pv::all();
        return view('admin.Pvs.create', compact("pvs"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePVRequest $request)
    {
        $pvs = new Pv();
        $pvs->Num_PV = $request->Num_PV;
       
       
        $pvs->save();

        return redirect()->route('pvs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PV $pV)
    {
        return view('admin.Etudiants.show', compact('pv'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PV $pV)
    {
        return view('admin.Etudiants.edit', compact('pv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePVRequest $request, PV $pV)
    {
        $pvs = Pv::find($pV->id);
        $pvs->Num_PV = $request->Num_PV;
       
       
        $pvs->save();

        return redirect()->route('pvs.show', $pvs);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PV $pV)
    {
        $pV->delete();
        return redirect()->route('pvs.index');
    }
}
