<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Trajet;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Auth::user()->id;
        $reservations = Reservation::with(['user','voiture','trajet'])->where('user_id',$user)->get();
        //dd($reservations);
        return view('Users.client.reservations.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'trajet_id' => 'required|exists:trajets,id',
            'voiture_id' => 'required|exists:voitures,id',
            'date_reservation' => 'required|date',
            'time_reservation'=>'required|date_format:H:i',
            'nombre_personnes' => 'required|integer|min:1',
            'nombre_bags' => 'required|integer|min:1',
            'type_trajet' => 'required|in:one_way,round_trip',
        ]);
        $trajet = Trajet::findOrFail($request->trajet_id);
        $voiture = Voiture::findOrFail($request->voiture_id);
        $prix_personne=5;
        $prix_bag=2;
        $prix_base= $trajet->prix + $voiture->prix;
        $prix_personnes = $prix_personne * $request->nombre_personnes;
        $prix_bags = $prix_bag * $request->nombre_bags;
        $prix_total = $prix_base + $prix_personnes + $prix_bags;
        if($request->type_trajet == 'round_trip'){
            $prix_total *= 2;
        }

        Reservation::create([
            'user_id' => Auth::id(),
            'trajet_id' => $request->trajet_id,
            'voiture_id' => $request->voiture_id,
            'date_reservation' => $request->date_reservation,
            'time_reservation' => $request->time_reservation,
            'nombre_personnes' => $request->nombre_personnes,
            'nombre_bags' => $request->nombre_bags,
            'prix_total' => $prix_total,
            'status' => 'pending',
            'type_trajet' => $request->type_trajet,
        ]);
        return redirect()->route('client.reservations.index')->with('success', 'Your Reservations Is Being Processed.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::id(); // Récupération de l'ID utilisateur
        $reservation = Reservation::with(['voiture', 'trajet'])
                    ->where('user_id', $user)
                    ->where('id', $id) // Vérifie que l'ID correspond
                    ->firstOrFail(); // Renvoie 404 si non trouvé
        $trajets = Trajet::all();
        $voitures = Voiture::all();
        return view('Users.client.reservations.edit',compact('reservation','trajets','voitures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'trajet_id' => 'required|exists:trajets,id',
            'voiture_id' => 'required|exists:voitures,id',
            'date_reservation' => 'required|date',
            'time_reservation' => 'required|date_format:H:i',
            'nombre_personnes' => 'required|integer|min:1',
            'nombre_bags' => 'required|integer|min:1',
            'type_trajet' => 'required|in:one_way,round_trip',
        ]);

        // Find the reservation
        $reservation = Reservation::where('user_id', Auth::id())
                        ->where('id', $id)
                        ->firstOrFail();

        // Recalculate the price (same logic as store method)
        $trajet = Trajet::findOrFail($request->trajet_id);
        $voiture = Voiture::findOrFail($request->voiture_id);

        $prix_personne = 5;
        $prix_bag = 2;
        $prix_base = $trajet->prix + $voiture->prix;
        $prix_personnes = $prix_personne * $request->nombre_personnes;
        $prix_bags = $prix_bag * $request->nombre_bags;
        $prix_total = $prix_base + $prix_personnes + $prix_bags;

        if($request->type_trajet == 'round_trip') {
            $prix_total *= 2;
        }

        // Update the reservation
        $reservation->update([
            'trajet_id' => $request->trajet_id,
            'voiture_id' => $request->voiture_id,
            'date_reservation' => $request->date_reservation,
            'time_reservation' => $request->time_reservation,
            'nombre_personnes' => $request->nombre_personnes,
            'nombre_bags' => $request->nombre_bags,
            'prix_total' => $prix_total,
            'type_trajet' => $request->type_trajet,
        ]);

        return redirect()->route('client.reservations.index')
            ->with('success', 'Reservation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user=Auth::user()->id;
        $reservation = Reservation::where('id', $id)->where('user_id', $user)->first();
        if($reservation){
            $reservation->delete();
            return redirect()->route('client.reservations.index')->with('success','Reservation canceled successfully');

        }
    }
}
