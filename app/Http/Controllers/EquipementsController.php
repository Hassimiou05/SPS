<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use App\Models\Fournisseur;
use App\Models\TypeEquipement;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EquipementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = TypeEquipement::all();
        $fournisseur = Fournisseur::all();
        $equipement = Equipement::all();
        $typenom = TypeEquipement::pluck('nom');

        return view('equipement.equipement', compact('type', 'fournisseur', 'equipement', 'typenom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate([

            'nom' => 'required|max:255',

        ]);
        $clients = TypeEquipement::create($validatedata);
        return back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storage(Request $request)
    {
        $validatedata = $request->validate([

            'type_id' => 'required|max:255',
            'modele' => 'required|max:255',
            'description' => 'required|max:255',
            'fournisseur_id' => 'required|max:255',
            'quantite' => 'required|max:255',

        ]);
        $equipement = Equipement::create($validatedata);
        return redirect('/equipement');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
