<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Client\ReservationsController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\ProfileController;
use App\Models\Reservation;
use App\Models\Trajet;
use App\Models\User;
use App\Models\Voiture;
use Illuminate\Support\Facades\Route;





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/contact',function(){
    return view('Users.accueil.contact');
})->name('contact');

require __DIR__.'/auth.php';







Route::get('/our-fleet',function(){
    $voitures = Voiture::all();
    return view('Users.accueil.fleet',compact('voitures'));
})->name('our-fleet');

Route::get('/',function(){
    $voitures = Voiture::paginate(8);
    $selectVoiture = Voiture::all();
    $trajets = Trajet::all();

    return view('Users.accueil.home',compact('voitures','trajets','selectVoiture'));
})->name('home');




//////Admin Routes

Route::prefix('admin/dashboard')->name('admin.')->middleware(['auth','admin'])->group(function () {
    Route::resource('reservations', App\Http\Controllers\Admin\ReservationsController::class);
    Route::resource('voitures',App\Http\Controllers\Admin\VoituresController::class);
    Route::resource('trajets',App\Http\Controllers\Admin\TrajetsController::class);
    Route::resource('users',App\Http\Controllers\Admin\UsersController::class);
    Route::get('',function(){
        $TotalReservation = Reservation::count();
        $TotalUsers = User::where('role','client')->count();
        $TotalTrajets = Trajet::count();
        $TotalFleets = Voiture::count();
        $TotalAdmins = User::where('role','admin')->count();
        $NombreFleetAvailable = Voiture::where('etat','disponible')->count();
        $NombreFleetUnavailable = Voiture::where('etat','indisponible')->count();

        return view('Users.admin.dashboard',compact('TotalReservation','TotalUsers','TotalTrajets','TotalFleets','TotalAdmins','NombreFleetAvailable','NombreFleetUnavailable'));
    })->name('dashboard');

});
Route::patch('admin/users/{user}/update-role', [UsersController::class, 'updateRole'])->name('admin.users.updateRole');
Route::PUT('/reservations/{id}/status', [App\Http\Controllers\Admin\ReservationsController::class, 'updateStatus'])->name('reservations.updateStatus');



//////client Routes

Route::prefix('client/')->name('client.')->middleware('auth','client')->group(function () {
    Route::resource('reservations', App\Http\Controllers\Client\ReservationsController::class);
});

//////Fleet Routes
Route::get('fleet/{id}',[FleetController::class, 'show'])->name('fleet.show');
Route::get('/our-fleet',function(){
    $voitures = Voiture::all();
    return view('Users.accueil.fleet',compact('voitures'));
})->name('our-fleet');




/////home Routes





/////contact Routes
Route::get('/contact',function(){
    return view('Users.accueil.contact');
})->name('contact');



/////About Us

Route::get('/about',function(){
    return view('Users.accueil.about');
})->name('about');
