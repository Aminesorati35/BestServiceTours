<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VoituresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search');

    $cars = Voiture::query()
        ->when($search, function ($query, $search) {
            return $query->where(function($q) use ($search) {
                $q->where('marque', 'like', "%$search%")
                  ->orWhere('modele', 'like', "%$search%")
                  ->orWhere('annee', 'like', "%$search%")
                  ->orWhere('etat', 'like', "%$search%")
                  ->orWhere('prix', '=', $search); // Exact match for price
            });
        })
        ->orderBy('created_at', 'desc') // Add default ordering
        ->paginate(10)
        ->appends(['search' => $search]); // Preserve search in pagination

    return view('Users.admin.voitures.index', compact('cars'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Users.admin.voitures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'annee' => 'required|integer|min:1900|max:' . date('Y'),
            'nombre_places' => 'required|integer|min:1',
            'nombre_bags' => 'required|integer|min:0',
            'prix' => 'required|numeric|min:0',
            'etat' => 'required|in:disponible,réservée,indisponible',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
        } else {
            $imagePath = null;
        }
        Voiture::create([
            'marque' => $validated['marque'],
            'modele' => $validated['modele'],
            'annee' => $validated['annee'],
            'nombre_places' => $validated['nombre_places'],
            'nombre_bags' => $validated['nombre_bags'],
            'prix' => $validated['prix'],
            'etat' => $validated['etat'],
            'image' => $imagePath,
        ]);
        return redirect()->route('admin.voitures.index')->with('success', 'Voiture ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voiture $voiture)
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voiture $voiture)
    {
        return view('Users.admin.voitures.edit', data: compact('voiture'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voiture $voiture)
    {
        // Validate the request
        $validated = $request->validate([
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'annee' => 'required|integer|min:1900|max:' . date('Y'),
            'nombre_places' => 'required|integer|min:1',
            'nombre_bags' => 'required|integer|min:0',
            'prix' => 'required|numeric|min:0',
            'etat' => 'required|in:disponible,réservée,indisponible',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($voiture->image) {
                Storage::disk('public')->delete($voiture->image);
            }

            // Store new image
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }

        // Update the voiture record
        $voiture->update($validated);

        // Redirect with success message
        return redirect()->route('admin.voitures.index')->with('success', 'Voiture modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voiture $voiture)
    {
        $voiture->delete();
        return redirect()->route('admin.voitures.index')->with('success', 'Voiture Deleted avec succès.');
    }
}
