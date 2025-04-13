<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trajets', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->string('name'); // Nom du trajet (par exemple: Marrakech - Aéroport)
            $table->string('description')->nullable(); // Description du trajet
            $table->string('depart'); // Lieu de départ (par exemple: Marrakech)
            $table->string('arrivee'); // Lieu d'arrivée (par exemple: Aéroport)
            $table->integer('duree_estimee'); // Durée estimée du trajet en minutes
            $table->decimal('prix', 8, 2); // Prix du trajet
            $table->timestamps(); // Dates de création et de mise à jour
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trajets');
    }
};
