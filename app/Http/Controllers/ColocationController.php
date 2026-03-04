<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colocations = Auth::user()->colocations;
        return view('colocations.index', compact('colocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $hasActive = $user
            ->colocations()
            ->where('status', 'active')
            ->wherePivot('left_at', null)
            ->exists();

        if ($hasActive) {
            return redirect()->back()
                ->with('error', 'You already have an active colocation.');
        }

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $colocation = \App\Models\Colocation::create([
            'name'        => $request->name,
            'description' => $request->description,
            'status'      => 'active',
        ]);

        $colocation->users()->attach(Auth::id(), [
            'role_colocation' => 'owner',
            'left_at'         => null
        ]);

        return redirect()->back()->with('success', 'Colocation created successfully!');
    }

    /**
     * Display the specified resource.
     */
    // Dans ColocationController.php
    public function show(Colocation $colocation)
    {
        $colocation->load(['users', 'depenses.category', 'depenses.user']);

        return view('colocations.show', [
            'colocation' => $colocation,
            'membres'    => $colocation->users,
            'depenses'   => $colocation->depenses ?? collect(), // Sécurité : utilise une collection vide si null
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
