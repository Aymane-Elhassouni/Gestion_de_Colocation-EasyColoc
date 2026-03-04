<?php

namespace App\Http\Controllers;

use App\Models\AddPayee;
use App\Models\Colocation;
use App\Models\Depense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepenseController extends Controller
{
    public function index($colocationId)
    {
        $depenses = Depense::where('colocations_id', $colocationId)
            ->with(['payees.user'])
            ->latest()
            ->get();

        return view('depenses.index', compact('depenses', 'colocationId'));
    }
    public function show($id)
{
    
    $colocation = Colocation::findOrFail($id);

    
    $depenses = Depense::where('colocations_id', $id)->get();

   
    return view('colocations.show', compact('colocation', 'depenses'));
}
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'montant' => 'required|numeric',
            'colocations_id' => 'required|exists:colocations,id',
            'categories_id' => 'required|exists:categories,id',
            'participants' => 'required|array'
        ]);

        $depense = Depense::create([
            'titre' => $request->titre,
            'montant' => $request->montant,
            'date' => now(),
            'colocations_id' => $request->colocations_id,
            'categories_id' => $request->categories_id,
            'users_id' => Auth::id(),
        ]);

        $montantParPersonne = $request->montant / count($request->participants);

        foreach ($request->participants as $userId) {
            AddPayee::create([
                'montant_a_payee' => $montantParPersonne,
                'status' => 'en_attente',
                'users_id' => $userId,
                'depenses_id' => $depense->id
            ]);
        }

        return back()->with('success', 'Dépense ajoutée et répartie !');
    }
}
