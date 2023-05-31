<?php

namespace App\Http\Controllers;

use App\Models\Contrats;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class querycontroller extends Controller
{
    public function index()
    {
        $contrat = DB::table('clients')
            ->join('contrats', 'clients.id', '=', 'contrats.client_id')
            ->select('clients.*', 'contrats.phone', 'orders.price')
            ->get();
    }
}
