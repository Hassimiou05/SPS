<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Agents;
use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Contrats;
use Illuminate\Support\Facades\App;

class clent_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::paginate(10);



        return view('clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crclient');
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
            'prenom' => 'required|max:255',
            'lieu_residence' => 'required|max:255',
            'mail' => 'required|max:255',
            'tel' => 'required|max:255',

        ]);
        $clients = Clients::create($validatedata);

        return redirect('/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $client, Request $id)
    {

        $cont = Contrats::where('client_id', $client->client_id)->get();
        return view("clidetails", compact('client', 'cont'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($client_id)
    {
        $client = Clients::findOrFail($client_id);
        return view('mclient', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $client)
    {
        $validatedata = $request->validate([

            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'lieu_residence' => 'required|max:255',
            'mail' => 'required|max:255',
            'tel' => 'required|max:255',

        ]);
        $client->update($request->all());



        return redirect('/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $client)
    {
        $client->delete();

        return redirect('/clients');
    }
}
