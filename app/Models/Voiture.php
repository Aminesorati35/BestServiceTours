<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    protected $fillable = [
        'marque', 'modele', 'annee', 'nombre_places', 'nombre_bags', 'prix', 'etat', 'image'
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
