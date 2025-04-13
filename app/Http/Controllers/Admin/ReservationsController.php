<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'voiture', 'trajet'])->paginate(10);
        return  view('Users.admin.reservations.index', compact('reservations'));
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
    public function store(Request $request) {
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation) {
        return redirect()->route('home');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')->with('success', 'Reservation Deleted successfully');
    }
    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = $request->input('status');
        $reservation->save();

        return back()->with('success', 'Status updated successfully');
    }
}
