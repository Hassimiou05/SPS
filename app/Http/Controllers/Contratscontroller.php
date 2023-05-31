<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Contrats;
use Illuminate\Http\Request;

class Contratscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contrat = Contrats::all();


        return view('contrats/contrat', compact('contrat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Clients::all();

        return view('contrats/addcontrat', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        Contrats::create([

            'nbre_agents' => $request->nbre_agents,
            'date_debut' => $request->date_debut,
            'status' => $request->status,
            'client_id' => $request->client_id,
        ]);

        return redirect('/contrats');
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
        $contrat = Contrats::findOrFail($id);
        return view('contrats/mcontrat', compact('contrat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrats $contrat)
    {
        $request->validate([

            'nbre_agents' => 'required|max:255',
            'date_debut' => 'required|max:255',
            'status' => 'required|max:255',
            'client_id' => 'required|max:255',

        ]);
        $contrat->update($request->all());



        return redirect('/contrats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrats $contrat)
    {
        $contrat->delete();
        return redirect('/contrats');
    }
}
