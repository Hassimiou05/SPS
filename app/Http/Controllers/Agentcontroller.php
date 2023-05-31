<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\Sites;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use PDF;

class Agentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $agents = Agents::paginate(10);
        if ($request->filled('tri')) {

            if ($request->tri == 'defaut') {
                $agents = Agents::orderBy('id')->paginate(10);
            }
            if ($request->tri == 'nom') {
                $agents = Agents::orderBy('nom')->paginate(10);
            }
            if ($request->tri == 'role') {
                $agents = Agents::orderBy('role')->paginate(10);
            }
        }

        return view('index', compact('agents'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'role' => 'required',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required|max:255',
            'lieu_residence' => 'required|max:255',
            'tel' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);
        $image = $request->file('image');
        $destinationpath = 'image/';
        $profileimage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationpath, $profileimage);
        $validatedata['image'] = $profileimage;
        $agents = Agents::create($validatedata);

        return redirect('/agents');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = Agents::find($id);
        $site = Sites::whereRaw("FIND_IN_SET($id, REPLACE(agents_id, ' ', '')) > 0")->first();
        return view("voir", compact('agent', 'site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agents::findOrFail($id);
        return view('modifier', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agents $agent)
    {
        $request->validate([

            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'role' => 'required',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required|max:255',
            'lieu_residence' => 'required|max:255',
            'tel' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);
        $image = $request->file('image');
        $destinationpath = 'image/updated';
        $profileimage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationpath, $profileimage);
        $validatedata['image'] = $profileimage;
        $agent->update($request->all());



        return redirect('/agents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agents $agent)
    {

        $agent->delete();

        return redirect('/agents');
    }
    public function search(Request $request)
    {
        $search_text = $_GET['search'];
        $agent = Agents::where('nom', 'LIKE', '%' . $search_text . '%')->get();
        return view('search', compact('agent'));
    }
    public function autocomplete(Request $request)
    {
        $data = Agents::select("nom")
            ->where('nom', 'LIKE', '%' . $request->get('search') . '%')
            ->get();

        return response()->json($data);
    }


    public function aposte()
    {

        $aposte = Agents::where('poste', 'poste')->get();
        return view('agentposte', compact('aposte'));
    }
    public function createPDF()
    {
        // retreive all records from db
        $agents = Agents::all();

        $pdf = FacadePdf::loadView('pdf.agents', compact('agents'));
        // download PDF file with download method

        return $pdf->download('agents.pdf');
        return redirect('/agents');
    }
}
