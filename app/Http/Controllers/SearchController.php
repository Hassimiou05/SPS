<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');
        $agents = Agents::select('id', 'nom', 'prenom')
            ->where('nom', 'like', '%' . $query . '%')
            ->orWhere('prenom', 'like', '%' . $query . '%')
            ->get();
        dd($agents);
        return response()->json($agents);
    }
}
