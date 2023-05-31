<?php

namespace App\Http\Controllers;

use App\Models\Abscence;
use App\Models\Agents;
use App\Models\Fichedepaie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FichedepaieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fdp = Fichedepaie::all();
        return view('fichedepaie.index', compact('fdp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abscence = Abscence::all();

        return view('fichedepaie.create', compact('abscence'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fichedepaie::create([

            'abscence_id' => $request->abscence_id,
            'datedebut' => $request->datedebut,
            'datefin' => $request->datefin,
        ]);
        return redirect('/fichedepaie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fdp = Fichedepaie::find($id);
        $agents = Agents::all();
        $salage = 500;
        $salcont = 1000;
        $salsup = 1500;
        $abscence_agents = DB::table('abscence_agent')
            ->select('agent_id', 'nbre_jour')
            ->where('abscence_id', $id)
            ->get();

        $salaireAgents = [];
        foreach ($agents as $agent) {
            $nbre_jour = $abscence_agents->where('agent_id', $agent->id)->first()->nbre_jour;
            $nbre_jour = 30 - $nbre_jour;
            if ($agent->role == 'Agents') {
                $salaire = $nbre_jour * $salage;
            } elseif ($agent->role == 'Controlleur') {
                $salaire = $nbre_jour * $salcont;
            } elseif ($agent->role == 'Superviseur') {
                $salaire = $nbre_jour * $salsup;
            }
            $salaireAgents[] = [
                'id' => $agent->id,
                'nom' => $agent->nom,
                'prenom' => $agent->prenom,
                'salaire' => $salaire,
            ];
        }


        $ag = Agents::where('role', 'Agents')->count();
        $salages = $ag * $salage;
        $cont = Agents::where('role', 'Controlleur')->count();
        $salconts = $cont * $salcont;
        $sup = Agents::where('role', 'Superviseur')->count();
        $salsups = $sup * $salsup;
        $totalSalaire = $salages + $salconts + $salsups;
        return view('fichedepaie.détails', compact('fdp', 'salaireAgents', 'totalSalaire'));
    }

    public function calculsalaire()
    {

        $salage = 1000000;
        $salcont = 1500000;
        $salsup = 2000000;
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
