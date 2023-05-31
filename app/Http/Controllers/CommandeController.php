<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Equipement;
use App\Models\EquipementCommand;
use App\Models\User;
use App\Notifications\NouvelleCommandeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commande = Commande::where('livrer', false)->get();
        $commandeid = Commande::pluck('id');
        $hasEquipments = DB::table('equipement_commands')
            ->whereIn('commande_id', $commandeid)
            ->exists();
        $livrer = Commande::where('livrer', true)->exists();
        return view('equipement.commande', compact('commande', 'hasEquipments', 'livrer'));
    }
    public function historique()
    {
        $commande = Commande::where('livrer', true)->get();
        return view('equipement.histocommande', compact('commande'));
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
        $commande = Commande::create([

            'fournisseur_id' => $request->fournisseur_id,
            'date_commande' => $request->date_commande,
        ]);
        $usersToNotify = User::all();
        Notification::send($usersToNotify, new NouvelleCommandeNotification($commande));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipement = Equipement::all();

        $commande = DB::table('commandes')
            ->join('fournisseurs', 'commandes.fournisseur_id', '=', 'fournisseurs.id')
            ->select('commandes.*', 'fournisseurs.nom AS nom_fournisseur')
            ->where('commandes.id', $id)
            ->first();
        $hasEquipments = DB::table('equipement_commands')
            ->where('commande_id', $id)
            ->exists();
        $quantiteTotale = DB::table('equipement_commands')
            ->join('commandes', 'equipement_commands.commande_id', '=', 'commandes.id')
            ->where('equipement_commands.commande_id', $id)
            ->sum('equipement_commands.quantite');
        return view('equipement.cmdetails', compact('commande', 'equipement', 'hasEquipments', 'quantiteTotale'));
    }
    public function increment($id)
    {
        // Vérifiez si la commande se trouve dans la table equipement_commands
        $equipementCommand = DB::table('equipement_commands')
            ->where('commande_id', $id)
            ->first();

        if ($equipementCommand) {
            // Récupérez l'ID de l'équipement
            $equipementId = $equipementCommand->equipment_id;

            // Incrémentez la quantité de l'équipement dans la table equipement
            DB::table('equipements')
                ->where('id', $equipementId)
                ->increment('quantite', $equipementCommand->quantite);

            // Marquez la commande comme traitée
            DB::table('commandes')
                ->where('id', $id)
                ->update(['livrer' => true]);

            // Appelez la commande d'incrémentation avec l'ID de la commande
            //Artisan::call('commande:increment', ['id' => $id]);

            // Redirigez vers la vue de la commande
            return back();
        }

        // Si la commande n'a pas de correspondance dans la table equipement_commands, redirigez vers la vue de la commande
        return redirect()->route('commande.show', $id);
    }


    public function validecommande(Request $request)
    {
        EquipementCommand::create([

            'commande_id' => $request->commande_id,
            'equipment_id' => $request->equipment_id,
            'quantite' => $request->quantite,
        ]);
        return back();
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
