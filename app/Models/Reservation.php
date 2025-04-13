<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id', 'trajet_id', 'voiture_id', 'date_reservation', 'nombre_personnes','nombre_bags', 'prix_total', 'status', 'type_trajet','time_reservation'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }
}
