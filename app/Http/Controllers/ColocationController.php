<?php

namespace App\Http\Controllers;

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
        return view('dashboard_colocations.index', compact('colocations'));
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
        // 1. Validation kifma bghitiha
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // 2. Création mbachira bla array_merge
        $colocation = \App\Models\Colocation::create([
            'name'        => $request->name,
            'description' => $request->description,
            'status'      => 'active',
        ]);

        $colocation->users()->attach(Auth::id(), [
            'role_colocation' => 'owner',
            'left_at'         => null
        ]);
        return redirect()->back()->with('success', 'Colocation will be successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
