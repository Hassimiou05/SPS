<?php

namespace App\Http\Controllers;

use App\Models\Abscence;
use App\Models\Agents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class AbscenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $abscences = Abscence::all();
        $abid = $abscences->pluck('id');
        $dataIsLocked = DB::table('abscence_agent')->whereIn('abscence_id', $abid)->where('validé', true)->exists();

        $validatedAbscences = DB::table('abscence_agent')->whereIn('abscence_id', $abid)->where('validé', true)->pluck('abscence_id');

        return view('abscence', compact('abscences', 'dataIsLocked', 'validatedAbscences'));
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

            'periode' => 'required|max:255',
        ]);
        $abscence = Abscence::create($validatedata);
        return redirect('/abscence');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $abscenceValide = DB::table('abscence_agent')
            ->where('abscence_id', $id)
            ->where('validé', true)
            ->exists();
        $abscence = Abscence::find($id);
        $agents = Agents::all();
        return view('absdet', compact('agents', 'abscence', 'abscenceValide'));
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
        $abscence = Abscence::find($id);

        $agents = $request->input('agent_id');
        $nbre_jours = $request->input('nbre_jour');
        foreach ($agents as $key => $agent) {
            DB::table('abscence_agent')->updateOrInsert(
                ['abscence_id' => $abscence->id, 'agent_id' => $agent],
                ['nbre_jour' => $nbre_jours[$key]]
            );
        }
        Artisan::call('lock:abscence-data');


        return back();
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
