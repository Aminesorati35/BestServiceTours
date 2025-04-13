<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trajet;
use Illuminate\Http\Request;

class TrajetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trajets =Trajet::paginate(10);

        return view('Users.admin.trajets.index',compact('trajets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Users.admin.trajets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'name' => $request->depart . ' To ' . $request->arrivee
        ]);
        $validated = $request->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'depart'=>'required|string|max:255',
            'arrivee'=>'required|string|max:255',
            'duree_estimee'=>'required|integer',
            'prix'=>'required|numeric|min:0',
        ]);

        Trajet::create($validated);
        return redirect()->route('admin.trajets.index')->with('success', 'Trajet Ajoutée Avec Succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Trajet $trajet)
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trajet $trajet)
    {
        return view('Users.admin.trajets.edit',compact('trajet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trajet $trajet)
    {
        $request->merge([
            'name' => $request->depart . ' To ' . $request->arrivee
        ]);
        $validated = $request->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'depart'=>'required|string|max:255',
            'arrivee'=>'required|string|max:255',
            'duree_estimee'=>'required|integer',
            'prix'=>'required|numeric|min:0',
        ]);
        $trajet->update($validated);
        return redirect()->route('admin.trajets.index')->with('success', 'Trajet Modifier Avec Succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trajet $trajet)
    {
        $trajet->delete();
        return redirect()->route('admin.trajets.index')->with('success', 'Trajet Supprimer Avec Succès.');

    }
}
