<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    protected $fillable = [
        'name', 'description', 'depart', 'arrivee', 'duree_estimee', 'prix'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
