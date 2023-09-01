<?php

namespace App\Http\Controllers;

use App\Models\PV;
use App\Http\Requests\StorePVRequest;
use App\Http\Requests\UpdatePVRequest;
use App\Models\Jurys;

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
        $jurys=Jurys::all();
        return view('admin.Pvs.create', compact("pvs","jurys"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePVRequest $request)
    {
        $pvs = new Pv();
        $pvs->Num_PV = $request->Num_PV;
        $pvs->jury_id=$request->jury_id;
       
        $pvs->save();

        return redirect()->route('pvs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PV $pV)
    {
        $nom_jury=Jurys::find($pV->jury_id)->NumJury;
        return view('admin.Pvs.show', compact('pv','nom_jury'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PV $pV)
    {
        $jurys=Jurys::all();
        return view('admin.Pvs.edit', compact('pv','jurys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePVRequest $request, PV $pV)
    {
        $pvs = Pv::find($pV->id);
        $pvs->Num_PV = $request->Num_PV;
        $pvs->jury_id=$request->jury_id;
       
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
