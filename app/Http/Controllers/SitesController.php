<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\Clients;
use App\Models\Contrats;
use App\Models\Planing;
use App\Models\Sites;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Sites::all();
        return view('sites/index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contrats = Contrats::all();
        $agents = Agents::all();
        return view('sites/addsites', compact('contrats', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        #$agents_id = $input['agents_id'];
        #$input['agents_id'] = implode(',', $agents_id);
        Sites::create($input);


        return redirect('/sites');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Agents $agents)
    {

        $agent = Agents::all();
        $planning = DB::table('plannings')->select('agent_id', 'rest_day', 'shift')->where('site_id', $id)->get();
        $ag = Agents::all();
        $site = Sites::findOrFail($id);
        $agents_id = json_decode('[' . $site->agents_id . ']', true);
        $agents = Agents::whereIn('id', $agents_id)->get();
        $agent = DB::table('agents')
            ->whereNotIn('id', $agents_id)
            ->get();

        $contratid = Contrats::where('id', $site->contrat_id)->pluck('client_id');
        $contrat = Contrats::where('id', $site->contrat_id)->get();

        $client = Clients::where('client_id', $contratid)->get();
        return view('sites/détails', compact('site', 'agents', 'agent', 'client', 'contrat', 'ag', 'planning'));
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

        $site = Sites::find($id);
        $input = $request->all();
        $agents_id = $input['agents_id'];

        $input['agents_id'] = implode(',', $agents_id);

        $site->agents_id = $input['agents_id'];
        $site->save();
        $site->agents()->attach($input['agents_id']);

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
